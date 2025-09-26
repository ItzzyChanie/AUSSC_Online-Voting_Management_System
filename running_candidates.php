<?php
session_start();
include 'includes/conn.php';

// Get current year
$year = date("Y");

// Fetch all positions
$positions_query = "SELECT id, description FROM positions ORDER BY priority ASC";
$positions_result = mysqli_query($conn, $positions_query);

// Fetch all candidates grouped by position
$candidates_query = "SELECT c.firstname, c.lastname, c.platform, c.photo, c.position_id, c.partylist, p.description AS position
    FROM candidates c
    JOIN positions p ON c.position_id = p.id
    ORDER BY p.priority ASC, c.lastname ASC";
    
$candidates_result = mysqli_query($conn, $candidates_query);

// Group candidates by position
$candidates_by_position = [];
if ($candidates_result && mysqli_num_rows($candidates_result) > 0) {
    while ($row = mysqli_fetch_assoc($candidates_result)) {
        $candidates_by_position[$row['position']][] = $row;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Running Candidates</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
    body {
        font-family: 'Montserrat', Arial, sans-serif;
        background: #f7f7f7;
        margin: 0;
        padding: 0;
    }
    header {
        background: #2f42d3ff;
        color: #fff;
        padding: 10px 20px;
        box-shadow: 0 2px 8px #bdbdbd;
        text-align: center;
    }
    header h1 {
        font-size: 2.5rem;
        margin-bottom: 0.1rem;
        font-weight: 700;
    }
    header h2 {
        font-size: 1.5rem;
        font-weight: 500;
        margin-bottom: 0;
    }
    .login-button {
        background:#fff;
        color:#d32f2f;
        font-weight:bold;
        border-radius:8px;
        box-shadow:2px 2px 6px #bdbdbd;
        border:none;
        padding:0.5rem 1.5rem;
        font-size:1rem;
        text-decoration:none;
    }

    main {
        max-width: 900px;
        margin: 32px auto;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 2px 8px #bdbdbd;
        padding: 32px;
    }
    h3 {
        color: #2f42d3ff;
        font-size: 1.6rem;
        margin-bottom: 24px;
        font-weight: 700;
        margin-top: 0;
    }
    .position-section {
        margin-bottom: 48px;
    }
    .position-title {
        color: #2f42d3ff;
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 24px;
        text-align: left;
    }
    .candidates-container {
        display: flex;
        flex-wrap: wrap;
        gap: 32px;
        justify-content: flex-start;
    }
    .candidate-card {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 2px 8px #bdbdbd;
        width: 260px;
        padding: 24px 16px 16px 16px;
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 16px;
        position: relative;
    }
    .candidate-photo {
        width: 120px;
        height: 120px;
        border-radius: 12px;
        object-fit: cover;
        margin-bottom: 12px;
        box-shadow: 0 2px 8px #f1101070;
    }
    .candidate-name {
        font-size: 1.2rem;
        font-weight: bold;
        color: #222;
        margin-bottom: 8px;
        text-align: center;
    }
    .candidate-platform {
        font-size: 1rem;
        color: #444;
        background: #eaecfbff;
        border-radius: 8px;
        padding: 10px;
        max-height: 60px;
        overflow: hidden;
        text-overflow: ellipsis;
        margin-bottom: 8px;
        width: 100%;
        text-align: left;
        transition: max-height 0.3s;
    }
    .candidate-platform.expanded {
        max-height: 500px;
        overflow: auto;
    }
    .see-more-btn {
        background: none;
        border: none;
        color: #2f42d3ff;
        font-weight: bold;
        cursor: pointer;
        font-size: 0.95rem;
        margin-top: -4px;
        margin-bottom: 4px;
        text-align: left;
    }

    /* Candidate Photo Modal Styles */
    .photo-modal {
        display: none; 
        position: fixed; 
        z-index: 9999; 
        padding-top: 60px; 
        left: 0;
        top: 0;
        width: 100%; 
        height: 100%; 
        overflow: auto; 
        background-color: rgba(0,0,0,0.8);
        text-align: center;
    }
    .photo-modal .close-modal {
        position: absolute;
        top: 30px;
        right: 40px;
        color: #fff;
        font-size: 48px;
        font-weight: bold;
        cursor: pointer;
        z-index: 10001;
        transition: color 0.2s;
    }
    .photo-modal .close-modal:hover {
        color: #3f2fd3ff;
    }
    .photo-modal .modal-content {
        margin: auto;
        display: block;
        max-width: 90vw;
        max-height: 80vh;
        border-radius: 16px;
        box-shadow: 0 2px 16px #222;
        background: #fff;
    }
    .photo-modal .modal-caption {
        margin: 16px auto 0 auto;
        color: #fff;
        font-size: 1.2rem;
        font-weight: 600;
        text-shadow: 0 2px 8px #222;
    }
    @media (max-width: 600px) {
        .photo-modal .modal-content {
            max-width: 98vw;
            max-height: 60vh;
        }
        .photo-modal .close-modal {
            top: 10px;
            right: 16px;
            font-size: 32px;
        }
        .photo-modal .modal-caption {
            font-size: 1rem;
        }
    }

    @media (max-width: 900px) {
        .candidates-container {
            gap: 16px;
            justify-content: center;
        }
        .candidate-card {
            width: 45%;
            max-width: 300px;
        }
        .position-title {
            font-size: 1.6rem;
        }
    }

    @media (max-width: 600px) {
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .title-container {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        header h1,
        header h2 {
            text-align: left;
            margin: 0;
            font-size: 0.9rem;   /* smaller text */
            line-height: 1.2;
        }
        .login-button {
            margin-left: auto;
            font-size: 0.7rem;   /* smaller text */
            padding: 4px 8px;    /* smaller button */
        }

        main {
            padding: 12px;
            margin: 16px;
        }
        .position-title {
            font-size: 1.3rem;
            text-align: center;
        }
        .candidate-card {
            width: 100%;
            padding: 12px 8px;
            max-width: 100%;
        }
        .candidate-photo {
            width: 70px;
            height: 70px;
        }
        .candidate-name {
            font-size: 1rem;
        }
        .candidate-platform {
            font-size: 0.85rem;
            padding: 6px;
            max-height: 50px;
        }
        .see-more-btn {
            font-size: 0.8rem;
        }
        .position-section {
            margin-bottom: 24px;
        }
    }
    </style>
    </head>
        <body>
            <header>
        <div class="title-container">
            <h1>Candidates running</h1>
            <h2><?php echo $year; ?> Candidates</h2>
        </div>
        <a href="login.php" class="login-button">Login</a>
    </header>

    <style>
    header {
        background: #2f42d3ff;
        color: #fff;
        padding: 10px 20px;
        box-shadow: 0 2px 8px #bdbdbd;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative; 
    }
    .title-container {
        text-align: center;  
    }
    header h1 {
        font-size: 2.5rem;
        margin-bottom: 0.3rem;
        font-weight: 700;
    }
    header h2 {
        font-size: 1.5rem;
        font-weight: 500;
        margin: 0;
    }
    .login-button {
        position: absolute;
        right: 20px;
        background: #fff;
        color: #2f42d3ff;
        font-weight: bold;
        border-radius: 8px;
        box-shadow: 2px 2px 6px #bdbdbd;
        border: none;
        padding: 0.5rem 1.5rem;
        font-size: 1rem;
        text-decoration: none;
    }
    @media (max-width: 600px) {
        header {
            justify-content: space-between;
        }
        .title-container {
            text-align: left; 
        }
        header h1,
        header h2 {
            font-size: 0.9rem;
            line-height: 1.2;
            margin: 0;
        }
        .login-button {
            font-size: 0.7rem;
            padding: 4px 8px;
            position: static;
            margin-left: auto;
        }
    }
</style>

    <main>
        <?php
        $has_candidates = false;
        if ($positions_result && mysqli_num_rows($positions_result) > 0) {

            foreach ($candidates_by_position as $cands) {
                if (count($cands) > 0) {
                    $has_candidates = true;
                    break;
                }
            }

            if ($has_candidates) {
                foreach ($positions_result as $pos) {
                    $position_name = $pos['description'];
                    
                    $candidates = isset($candidates_by_position[$position_name]) ? $candidates_by_position[$position_name] : [];
                    echo "<section class='position-section'>";
                    echo "<div class='position-title'>List of Running {$position_name}s</div>";
                    echo "<div class='candidates-container'>";

                    if (count($candidates) > 0) {
                        foreach ($candidates as $cand) {
                            $fullname = $cand['firstname'] . ' ' . $cand['lastname'];
                            $photo = !empty($cand['photo']) ? $cand['photo'] : 'default.png';
                            $platform = htmlspecialchars($cand['platform']);
                            $is_long = mb_strlen($platform) > 120;
                            $platform_short = $is_long ? mb_substr($platform, 0, 120) . '...' : $platform;
                            $partylist = !empty($cand['partylist']) ? $cand['partylist'] : '';

                            echo "<div class='candidate-card'>
                                    <div class='candidate-photo-wrapper'>
                                        <img src='images/{$photo}' alt='{$fullname}' class='candidate-photo' onclick='showPhotoModal(\"images/{$photo}\", \"{$fullname}\")' style='cursor:pointer;'>
                                    </div>
                                    <div class='partylist' style='font-size:13px; color:#4682B4; font-weight:600; margin-bottom:2px;'>
                                    ".htmlspecialchars($partylist)." Party List</div>
                                    <div class='candidate-name'>{$fullname}</div>";

                            if ($is_long) {
                                echo "<div class='candidate-platform'>$platform_short</div>";
                                echo "<button class='see-more-btn' onclick='togglePlatform(this)'>See more</button>";
                                echo "<div class='candidate-platform expanded' style='display:none;'>$platform</div>";
                            } 
                            else {
                                echo "<div class='candidate-platform'>$platform</div>";
                            }
                            echo "</div>";
                        }
                    } 
                    else {
                        echo "<div style='color:#888; 
                        font-size:1.1rem;'>No running candidates for this position.</div>";
                    }
                    echo "</div></section>";
                }
            } 
            else {
                echo "<div style='color:#888; 
                font-size:1.5rem; 
                text-align:center; 
                margin:48px 0;'>No Running Candidates yet.</div>";
            }
        } 
        else {
            echo "<div style='color:#888; 
            font-size:1.5rem; 
            text-align:center; 
            margin:48px 0;'>No Running Candidates yet.</div>";
        }
        ?>
    </main>

    <!-- Candidate Photo Modal -->
    <div id="photoModal" class="photo-modal" style="display:none;">
        <span class="close-modal" onclick="closePhotoModal()">&times;</span>
        <img class="modal-content" id="modalImg" src="" alt="">
        <div id="modalCaption" class="modal-caption"></div>
    </div>

    <style>
    /* Candidate Photo Modal Styles */
    .photo-modal {
        display: none; 
        position: fixed; 
        z-index: 9999; 
        padding-top: 60px; 
        left: 0;
        top: 0;
        width: 100%; 
        height: 100%; 
        overflow: auto; 
        background-color: rgba(0,0,0,0.8);
        text-align: center;
    }
    .photo-modal .close-modal {
        position: absolute;
        top: 30px;
        right: 40px;
        color: #fff;
        font-size: 48px;
        font-weight: bold;
        cursor: pointer;
        z-index: 10001;
        transition: color 0.2s;
    }
    .photo-modal .close-modal:hover {
        color: #2f32d3ff;
    }
    .photo-modal .modal-content {
        margin: auto;
        display: block;
        max-width: 90vw;
        max-height: 80vh;
        border-radius: 16px;
        box-shadow: 0 2px 16px #222;
        background: #fff;
    }
    .photo-modal .modal-caption {
        margin: 16px auto 0 auto;
        color: #fff;
        font-size: 1.2rem;
        font-weight: 600;
        text-shadow: 0 2px 8px #222;
    }
    @media (max-width: 600px) {
        .photo-modal .modal-content {
            max-width: 98vw;
            max-height: 60vh;
        }
        .photo-modal .close-modal {
            top: 10px;
            right: 16px;
            font-size: 32px;
        }
        .photo-modal .modal-caption {
            font-size: 1rem;
        }
    }
    </style>

    <script>
        function togglePlatform(btn) {
            var shortDiv = btn.previousElementSibling;
            var fullDiv = btn.nextElementSibling;

            if (fullDiv.style.display === "none") {
                fullDiv.style.display = "block";
                shortDiv.style.display = "none";
                btn.textContent = "See less";
            } 
            else {
                fullDiv.style.display = "none";
                shortDiv.style.display = "block";
                btn.textContent = "See more";
            }
        }

        function showPhotoModal(src, caption) {
            var modal = document.getElementById('photoModal');
            var modalImg = document.getElementById('modalImg');
            var modalCaption = document.getElementById('modalCaption');
            modal.style.display = "block";
            modalImg.src = src;
            modalImg.alt = caption;
            modalCaption.textContent = caption;
            document.body.style.overflow = 'hidden'; // Prevent background scroll
        }
        function closePhotoModal() {
            var modal = document.getElementById('photoModal');
            modal.style.display = "none";
            document.body.style.overflow = ''; // Restore scroll
        }
        // Close modal when clicking outside the image
        window.onclick = function(event) {
            var modal = document.getElementById('photoModal');
            if (event.target === modal) {
                closePhotoModal();
            }
        }
    </script>
</body>
</html>