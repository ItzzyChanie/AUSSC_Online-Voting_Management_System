<?php
include 'includes/session.php';
include 'includes/conn.php';

// Election title and date
$election_title = "AUSSC Online Voting Results";
$election_date = date("F d, Y");

// HTML for PDF
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ballot Results - Print</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .header-flex {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 18px;
            margin-top: 10px;
        }
        .header-center {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .header-center-content {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .header-au-logo {
            position: relative;
            left: 55px;
        }
        .header-au-logo img {
            height: 60px;
        }
        .header-texts {
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            top: 20px;
            left: 70px;
            margin-right: 12px;
        }
        .school { font-size: 1.1em; font-weight: bold; }
        .campus { font-size: 1em; margin-bottom: 2px; }
        .address { font-size: 0.95em; margin-bottom: 8px; }
        .title { font-size: 1em; font-weight: bold; margin-top: 8px; }
        .date { font-size: 0.95em; margin-bottom: 10px; }
        .header-logos-right {
            display: flex;
            align-items: center;
            margin-left: 58px;
        }
        .header-logos-right img {
            height: 60px;
            position: static;
            margin-left: -10px;
        }
        .header-logos-right img.aussc-logo {
            height: 90px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
            background: #fff;
            box-shadow: 0 2px 8px #bdbdbd44;
            overflow: hidden;
        }
        th, td {
            border: 1px solid #bbb;
            padding: 10px 14px;
            text-align: left;
            font-size: 1.05em;
        }
        th {
            background: #4682B4;
            color: #fff;
            font-weight: 700;
            font-size: 1.08em;
        }
        tr:nth-child(even) td {
            background: #f6f8fa;
        }
        .position-title {
            font-size: 1.1em;
            font-weight: bold;
            background: #e0e0e0;
            padding: 10px 8px;
            border-radius: 6px 6px 0 0;
            margin-top: 30px;
        }
        .total-votes {
            font-size: 1.1em;
            font-weight: bold;
            margin-top: 20px;
        }
        .content-container {
            margin-left: 40px;
            margin-right: 40px;
        }
        .btn-print {
            background: #1f7834ff;
            color: #fff;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            padding: 12px 36px;
            font-size: 1.1em;
            margin: 0 10px;
            cursor: pointer;
            box-shadow: 2px 2px 6px #bdbdbd;
            transition: background 0.2s;
        }
        .btn-print:hover {
            background: #145a23;
        }
        .btn-back {
            display: inline-block;
            background: #4682B4;
            color: #fff;
            font-weight: bold;
            border-radius: 8px;
            padding: 12px 36px;
            font-size: 1.1em;
            margin: 0 10px;
            text-decoration: none;
            box-shadow: 2px 2px 6px #bdbdbd;
            transition: background 0.2s;
        }
        .btn-back:hover {
            background: #315a8c;
            color: #fff;
        }
        @media print {
            .no-print { display: none; }
            .header-flex { margin-bottom: 0; }
            table { box-shadow: none; }
        }
    </style>
</head>

<body>
    <div class="header-flex">
        <div class="header-center">
            <div class="header-center-content">
                <span class="header-au-logo">
                    <img src="../images/au logo.png" alt="AU Logo">
                </span>

                <span class="header-texts">
                    <div class="school">Arellano University</div>
                    <div class="campus">Juan Sumulong Campus</div>
                    <div class="address">2600 Legarda St., Sampaloc, Manila, Philippines</div>
                    <div class="title"><?php echo $election_title; ?></div>
                    <div class="date">Date: <?php echo $election_date; ?></div>
                </span>

                <div class="header-logos-right">
                    <img src="../images/AUSSC_logo.png" alt="AUSSC Logo" class="aussc-logo">
                    <img src="../images/osa_logo.png" alt="OSA Logo">
                </div>
            </div>
        </div>
    </div>

    <div class="content-container">
    <?php
    // Get all positions
    $positions = [];
    $sql = "SELECT * FROM positions ORDER BY priority ASC";
    $query = $conn->query($sql);

    while
    ($row = $query->fetch_assoc()) {
        $positions[] = $row;
    }

    // Get candidates and votes per position
    $results = [];
    $total_votes_cast = 0;
    foreach ($positions as $pos) {
        $candidates = [];
        $sql = "SELECT * FROM candidates WHERE position_id = '".$pos['id']."'";
        $cquery = $conn->query($sql);

        while
        ($crow = $cquery->fetch_assoc()) {
            $sql = "SELECT * FROM votes WHERE candidate_id = '".$crow['id']."'";
            $vquery = $conn->query($sql);
            $vote_count = $vquery->num_rows;
            $candidates[] = [
                'name' => $crow['firstname'] . ' ' . $crow['lastname'],
                'votes' => $vote_count
            ];
            $total_votes_cast += $vote_count;
        }
        $results[] = [
            'position' => $pos['description'],
            'candidates' => $candidates
        ];
    }
    foreach ($results as $res): ?>
        <div class="position-title"><?php echo $res['position']; ?></div>
        <table>
            <thead>
                <tr>
                    <th>Candidate Name</th>
                    <th>Votes Received</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($res['candidates']) > 0): ?>
                    <?php foreach ($res['candidates'] as $cand): ?>
                        <tr>
                            <td><?php echo $cand['name']; ?></td>
                            <td><?php echo $cand['votes']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="2">No candidates for this position.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
        
    <?php endforeach; ?>
    <div class="total-votes">Total Votes Cast: <?php echo $total_votes_cast; ?></div>
    </div>
    <div class="no-print" style="text-align:center; margin:30px;">
        <button class="btn-print" onclick="window.print()">Print</button>
        <a href="home.php" class="btn-back">Back to Dashboard</a>
    </div>
</body>
</html>
</html>
