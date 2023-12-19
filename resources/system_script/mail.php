<?php
    include_once("db_init.php");

    // $find_to_send_email = $sql -> prepare('SELECT * FROM `send_mail_list`');
    // $find_to_send_email -> execute();


    // $find_be_volunteer_email = $sql -> prepare('SELECT * FROM `be_volunteer` WHERE id = :id');
    // // $find_be_volunteer_email -> execute(array('id' => ))

    // $find_find_volunteer_email = $sql -> prepare('SELECT * FROM `find_volunteer` WHERE id = :id');
?>

<?php
    // while($row = $find_to_send_email->fetch(PDO::FETCH_ASSOC)){
    //     $find_be_volunteer_email -> execute(array('id' => $row['be_volunteer']));
    //     $find_find_volunteer_email -> execute(array('id' => $row['find_volunteer_id']));
?>
<form method="GET" name="form" id="form" target="nm_iframe" action="https://service.chyanweb.com/email/send.php">
    <input name="subject" value="弱勢數位學習關懷平台 - 通知" hidden>
    <input name="body" value="我們已收到您的申請，將儘速回覆您申請結果，再請您耐心稍候，感謝！" hidden>
    <input name="to" value="bobo190790@gmail.com" hidden>
</form>
<iframe id="id_iframe" name="nm_iframe" style="display:none;"></iframe>
<script>
    form.submit()
</script>

<?php
    // }
?>
