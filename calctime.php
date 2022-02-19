<?php
// JUST FOR ME
// Script for counting work time from my notes
function minutes($t)
{
    $res = array_map(function ($el) {
        return (int) $el;
    }, explode(":", $t));

    return $res[0] * 60 + $res[1];
}

if (@$_POST)
{
    $starts = $_POST['time_start'];
    $ends = $_POST['time_end'];
    $work_time = [];
    $all_time = 0;

    for ($i = 0; $i < count($starts); ++ $i)
    {
        if (!$starts[$i])
            continue;

        $timelinestart = minutes($starts[$i]);
        $timelineend = minutes($ends[$i]);

        if ($timelinestart > $timelineend)
            $timelineend += 24 * 60;

        $item = $timelineend - $timelinestart;
        $work_time[] = $item;
        $all_time += $item;
    }

    var_dump($work_time);
    $minutes = $all_time % 60;
    $hours = ($all_time - $minutes) / 60;
    echo "<h1>Ты работал над проектом $hours часов $minutes минут";
}
?>

<div id="hidden-html" hidden>
    <div>
        <input type="time" name="time_start[]" placeholder="Время начала">
        <input type="time" name="time_end[]" placeholder="Время окончания">
    </div>
    <p></p>
</div>

<form method="post" id="time">
    <div>
        <input type="time" name="time_start[]" placeholder="Время начала">
        <input type="time" name="time_end[]" placeholder="Время окончания">
    </div>
    <p></p>

    <button type="submit">Отправить</button>
</form>
<button onclick="add()">Добавить</button>

<script>
    var t = document.getElementById('time');
    var h = document.getElementById('hidden-html');

    function add()
    {
        h.innerHTML += `
        <div>
            <input type="time" name="time_start[]" placeholder="Время начала">
            <input type="time" name="time_end[]" placeholder="Время окончания">
        </div>
        <p></p>
        `;

        t.innerHTML = h.innerHTML + `
        <button type="submit">Отправить</button>
        `;
    }
</script>

