<?php

function logPollSnapshot($tweetId, $pollVotes, $likes, $retweets) {
    $snapshot = [
        "tweet_id" => $tweetId,
        "poll_votes" => $pollVotes,
        "likes" => $likes,
        "retweets" => $retweets,
        "timestamp" => gmdate("c")
    ];

    $file = __DIR__ . "/poll_snapshots.jsonl";

    file_put_contents(
        $file,
        json_encode($snapshot) . PHP_EOL,
        FILE_APPEND
    );

    return $snapshot;
}


// example test runs
$tests = [
    ["tweet_id" => "621904", "poll_votes" => 3, "likes" => 2, "retweets" => 1],
    ["tweet_id" => "621904", "poll_votes" => 12, "likes" => 5, "retweets" => 2],
    ["tweet_id" => "621904", "poll_votes" => 28, "likes" => 9, "retweets" => 4]
];

foreach ($tests as $run) {

    $result = logPollSnapshot(
        $run["tweet_id"],
        $run["poll_votes"],
        $run["likes"],
        $run["retweets"]
    );

    echo "Logged snapshot:\n";
    print_r($result);
    echo "\n";

    sleep(1);
}

?>
