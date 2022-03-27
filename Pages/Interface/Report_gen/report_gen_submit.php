<?php
    session_start();
    $file_path = $_SERVER["DOCUMENT_ROOT"];
    $username = $_SESSION["username"];
    include $file_path."/Includes/Php/dbh.php";
    include $file_path."/Includes/Php/check_user_pass.php";
    include $file_path."/Includes/Php/get_account_type.php";
    include $file_path."/Includes/Php/get_user_theme.php";

    if (!$account_type == "teacher" or !$account_type == "admin") {
        header ("location: /Pages/Interface/Misc/not_teacher_or_admin.php")
    }
    $report_num = rand(1,2)
    $name = $conn -> real_escape_string($_POST["name"]);
    $grade = $conn -> real_escape_string($_POST["grade"]);
    $subject = $conn -> real_escape_string($_POST["subject"]);

    if ($grade == 8 or $grade == 9 and $report_num == 1) {
        $_SESSION["report"] = $name." has been making excellent progress in " ­.$subject­." and I am pleased that they has been applying maximum effort into the subject even during remote learning. My only target would be to continue maintaining the high values and behaviours that they instil in the subject as this will propel them to obtaining amazing grades.";
    }
    else if ($grade == 8 or $grade == 9 and $report_num == 2) {
        $_SESSION["report"] = $name." is able to comprehend even the most difficult concepts with relative ease and, even more importantly, they are able to explain them clearly and concisely, which is a vital skill for those aspiring to achieve the very top marks. I have little doubt that ".$name." will continue to progress in exactly the same vein next year, and fully expect them to be very successful.";
    }
    else if ($grade == 7 and $report_num == 1) {
        $_SESSION["report"] = $name." has made a strong start to the year. They are conscientious and keen to do well. Their classwork and prep are both completed to a good standard. As we approach the examinations, it is vital that ".$name." completes their homework to the best of their ability and that they makes the most of the chance to complete exam style questions in timed silence.";
    }
    else if ($grade == 7 and $report_num == 2) {
        $_SESSION["report"] = $name." has worked hard on both in class and in homework. Their result was very pleasing given where we are in the course and reflect that they are on a trajectory for success. ".$name." must work on their exam technique and her reference to examples where appropriate. There is plenty of opportunity for growth, but some revision of key content over the summer would be sensible!";
    }
    else if ($grade == 6 and $report_num == 1) {
        $_SESSION["report"] = $name." continues making progress though this remote learn. "$name."’s activities show how they is improving in ".$subject." and they have also demonstrated good levels of engagement in the subject. To continue to make progress, they should revise specific examples within the content and use it in exam style questions to ensure they produces work that demonstrates their ability.";
    }
    else if ($grade == 6 and $report_num == 2) {
        $_SESSION["report"] = "I have been most impressed with ".$name."’s attitude and effort since the start of term. They has participated in discussions, making some valuable contributions, and through both this and their work already shown an understanding of the content we are studying. I have every confidence that ".$name." has the approach to learning that will allow them to make the progress needed to do themselves proud!";
    }
    else if ($grade == 4 or $grade == 5 and $report_num == 1) {
        $_SESSION["report"] = $name." continues to work hard and engage fully with class activities with prep completed thoroughly and to a high standard. As ".$name." shows great potential in this subject it is a shame that they haven’t yet achieved the grade that they deserve. However, in order to achieve a good result, they need now to spend time in revising the content and using the revision booklet to acquire a sound knowledge of key concepts and ensuring her vocabulary is fully in her memory.";
    }
    else if ($grade == 4 or $grade == 5 and $report_num == 2) {
        $_SESSION["report"] = $name." has worked well all year, and so I was a little disappointed in their examination result, which, although solid, reflected a lack of detailed knowledge. Their answers were sound, but the lack of depth in their answers cost them the higher grades. Overall though, it's been a positive term, with much to build on next term.";
    }
    else {
        $_SESSION["report"] = "Please enter valid inputs";
    }
    header ("location: ./report_gen.php");
?>
<!DOCTYPE html>
<html>
    <head>
    <title>SAMSi</title>
    </head>
    <body>
        <p>If you are seeing this page, an error has occured</p>
    </body>
</html>
