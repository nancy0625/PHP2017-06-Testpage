<?php
session_start();
if (! isset($_SESSION['testers'])) {
    header("location:login.php");
}

$paperId = $_REQUEST["paper_test_id"];
$studentId = $_SESSION['testers']['studentId'];
// 是否做过试卷
$findPaper = [
    'studentid' => $studentId,
    'paper_id' => $paperId
];
require_once '../dbconfig.php';
$sql1 = "select * from answer_paper where paper_id='$paperId' and studentid='$studentId'";

if (! mysql_fetch_array(@mysql_query($sql1))) {
    // 创建空白试卷
    $studentId = $_SESSION['testers']['studentId'];
    $sql2 = "select * from paper where id='$paperId'";
    $paperResult = mysql_fetch_array(mysql_query($sql2));
    // 查询对应的题目和选项
    $content = $paperResult['content'];
    // 将字符串转化为数组
    $questionNum = explode(",", $content);
    // 创建储存对应答案的数组,用函数serialize()将数组序列化存储，返回字符串
    
    $answerNull = serialize([
        'a' => 0
    ]);
    
    // 写入空白试卷
    foreach ($questionNum as $no) {
        /*
         * $data = [ 'studentid' => $studentid, 'paper_id' => $paperId,
         * 'select_question_id' => $no, 'answer' => "" ];
         */
        $sqlinert = "insert into answer_paper(studentid,paper_id,select_question_id,answer) values('$studentId','$paperId','$no','')";
        @mysql_query($sqlinert);
    }
}
// 查询试卷
$queryPaper = "select * from paper where id='$paperId'";
$paper = mysql_fetch_array(mysql_query($queryPaper));
$paperName = $paper['name'];
$content = $paper['content'];
// 数组转字符串
$questionNo = explode(',', $content);
// 根据题目id查询题目及选项状态
$query = "select select_question_id,type,title,answer
from select_question,answer_paper where answer_paper.studentid= '$studentId' and select_question.id = answer_paper.select_question_id
and answer_paper.paper_id= '$paperId' and select_question.id in($content)";
$result = mysql_query($query);
while ($rowQuestion = mysql_fetch_array($result)) {
    $resultQuestion[] = $rowQuestion;
}
// 根据select_question表中储存的题干id，查询出选项表中查询选项内容
for ($i = 0; $i < count($resultQuestion); $i ++) {
    $resultQuestion[$i]['answer'] = unserialize($resultQuestion[$i]['answer']);
    $select_question_id = $resultQuestion[$i]['select_question_id'];
    //查询返回结果集
    $sqlitems = "select id,select_item.content from select_item where select_question_id ='$select_question_id'";
    $resultItems = mysql_query($sqlitems);
    $resultItemsArray = null;
    while ($rowItems = mysql_fetch_array($resultItems)) {
        $resultItemsArray[] = $rowItems;
    }
    $resultQuestion[$i]['items'] = $resultItemsArray;
}
// 获取查询数据
$selectQuestion = $resultQuestion;
// 获取用户名
$userName = $_SESSION['testers']['userName'];
?>



<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>在线考试</title>
<meta name="keywords" content="">
<meta name="description" content="">

<link rel="shortcut icon" href="favicon.ico">
<link href="../css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
<link href="../css/font-awesome.css?v=4.4.0" rel="stylesheet">
<link href="../css/plugins/iCheck/custom.css" rel="stylesheet">
<link href="../css/animate.css" rel="stylesheet">
<link href="../css/style.css?v=4.1.0" rel="stylesheet">
<script>if(window.top !== window.self){ window.top.location = window.location;}</script>
<!-- 处理得分的方法,老师的脚本 -->
<script language="javascript">
	function ajaxsubmit(itemid,type) {
		var selectItem = document.getElementById(itemid);
		var selectStatus = selectItem.checked;
		var selectQuestionId = selectItem.value;
		var paperId = document.getElementById('paperId').value;
		var data = {
			"paperId":paperId,
			"type":type,
			"itemid" : itemid,
			"selectQuestionId":selectQuestionId,
			"selectStatus" : selectStatus
		};
		var targetAddress = "insertOperate.php?"+Math.random();
		$.ajax({
			url :targetAddress, //后台处理程序  
			type : 'post', //数据传送方式  
			dataType : 'json', //接受数据格式  
			data : data, //要传送的数据  
			success : update_page
		//回传函数(这里是函数名字)
		});
	}
	//回传函数实体，参数为XMLhttpRequest.responseText 
	function update_page(json) { 
 		var str = "<i class='fa fa-check'></i>";
		var selectQuestionId = json.selectQuestionId;
		document.getElementById("sign" + selectQuestionId).innerHTML = str;
	}
</script>
</head>

<body class="gray-bg">
	<div
		style="color: blue; padding: 15px 50px 5px 50px; float: right; font-size: 16px;">	
				学号： <?php echo $_SESSION['testers']['studentId'];?> 姓名:
				<?php echo $_SESSION['testers']['userName'];?> &nbsp;&nbsp;
			</div>

		<div>
			<div class="row">
				<div class="col-md-11 col-sm-4" align="center">
					<h2><?=$paperName?></h2>
				</div>


			</div>


				<div class="panel-heading" align="center">
					<strong>选择题 ，选中标准答案（单选选一项，多选选多项）</strong>
				</div>
				<input type='hidden' name='paperId' id='paperId'
					value='<?=$paperId?>' /> <br />
					
					
						<?php foreach($selectQuestion as $row=>$vo){ ?>
						<hr/>
				<div class="row">
					<div class="col-md-12 col-sm-4">
						<div class="panel panel-success"  align="center">
							<div class="form-group input-group" >
							<i >
										<td width='30'><div id='<?=$vo['select_question_id']?>'></div></td>
										<td width='200'>&nbsp;&nbsp;&nbsp;&nbsp;<?=$row+1?>、</td>&nbsp;题&nbsp;&nbsp;目
								</i>
								<span><h3 foont-size:30px ><td >&nbsp;&nbsp;&nbsp;&nbsp;<?=$vo['title']?></td></h3></span>
								
						
					</div>
					</div>
							<div class="panel-body">
								<div class="form-group">
									<form action="#">
					<?php foreach($vo['items'] as  $index=>$item){?>
					<!-- 传递变化的选项进行打分  onchange="ajaxsubmit(<?=$item['id']?>,'<?=$vo['type']?>')" -->
					<div class="checkbox">
											<span class="input-group-addon"><label><input
													type="<?php echo $vo['type']=='单'?'radio':'checkbox';?>"
													name='<?php echo $vo['select_question_id'];?>'
													id='<?php echo $item['id'];?>'
													value='<?php echo $vo['select_question_id'];?>'
													onchange="ajaxsubmit(<?=$item['id']?>,'<?=$vo['type']?>')"
													<?php
            $id = $item['id'];
            
            // $answerid = $answer[$id];
            if (isset($vo['answer'][$id]) && $vo['answer'][$id] == '1') {
                echo "checked";
            }//如果已经选中答案，则输出选中
            ?> /><?=$index==0?'A':($index==1?'B':($index==2?'C':'D'))?>、<?=$item['content']?>/></label></span>
										</div>
										<?php }?>
			                     </form>
								</div>
							</div>
						</div>
					</div>
				</div>
						<?php }?>
			
			<!--试题内容行-->
				<div align="center">
					<a href="gameOver.php?paper_test_id=<?=$paperId?>"
						class="btn btn-info square-btn-adjust">确认交卷</a>
				</div>
				<!-- -------------------------------------------------------------------------- -->
		
		


	<!-- 全局js -->
	<script src="../js/jquery.min.js?v=2.1.4"></script>
	<script src="../js/bootstrap.min.js?v=3.3.6"></script>
	<!-- iCheck -->
	<script src="../js/plugins/iCheck/icheck.min.js"></script>
	<script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>




</body>

</html>