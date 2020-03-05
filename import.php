<?php
  if (php_sapi_name() !== 'cli') {
    die('This script should be used from cli!');
  }

  require_once 'bootstrap.php';

  $username = $argv[1];
  if (empty($username)) {
    die('arg is popiask username');
  }

  $alldata = array();

  $url = 'https://apiv3.popiask.cn/unuser/getQuestionFromUser/' . $username . '?pageSize=1';
  while ($url) {
    $json = file_get_contents($url);
    $arr = json_decode($json, true);

    if ($arr['code'] !== 200) {
      die('api err: ' . $arr['message']);
    }
    sleep(1);

    $data = $arr['content']['data'];
    foreach ($data as $row) {
      for ($i=0; $i < 5; $i++) { 
        $ans_url = 'https://apiv3.popiask.cn/unuser/questionVisitCode/' . $row['visit_code'];
        $data2 = json_decode(file_get_contents($ans_url), true);
        if ($data2['code'] !== 200) {
          echo 'api2 err: ' . $data2['message'];
          sleep(1);
        } else {
          break;
        }
      }

      $q = $row['title'];
      $a = $data2['content']['answer']['txt_content'];
      echo $q . '->' . $a . "\n";
      sleep(1);

      $alldata[] = array($q, $a, strtotime($row['created_at']), $row['answer_at']);
    }

    $url = $arr['content']['next_page_url'];
  }

  $alldata = array_reverse($alldata);
  foreach ($alldata as $row) {
    AskMeDB::$instance->insert($row[0], $row[1], $row[2], $row[3]);
  }

