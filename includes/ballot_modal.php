<?php
if (!isset($voter) || !isset($conn)) {
  include __DIR__ . '/session.php';
}
?>
<!-- Preview -->
<div class="modal fade" id="preview_modal">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #d8d1bd ;color:black ; font-size: 15px; font-family:Times" >
            <div class="modal-header">
              <button type="button"  class=" btn btn-close btn-curve pull-right" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" style="color:black ; font-size: 15px; font-family:Times">Vote Preview</h4>
            </div>
            <div class="modal-body">
              <div id="preview_body"></div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-curve pull-left" style='background-color:  #FFDEAD  ;color:black ; font-size: 12px; font-family:Times' data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>

<style>
  #platform .modal-dialog {
    display: flex;
    align-items: center;
    min-height: 90vh;
    justify-content: center;
    max-width: 600px;
    width: 600px;
  }
  #platform .modal-content {
    min-width: 600px;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
  }
  #platform .modal-body {
    flex: 1 1 auto;
    min-height: 120px;
    display: flex;
    align-items: center;
    justify-content: center;
  }
</style>
<style>
  #platform .modal-content {
    background: linear-gradient(135deg, #eee9ffff 0%, #ebeafbff 100%);
    color: #333;
    border-radius: 18px;
    box-shadow: 0 8px 32px rgba(211,47,47,0.18);
    padding: 0;
    font-family: 'Poppins', Arial, sans-serif;
    font-size: 16px;
    transition: box-shadow 0.3s;
  }
  #platform .modal-header {
    background: #3137ebe2;
    color: #fff;
    border-radius: 11px 11px 0 0;
    padding: 18px 28px 12px 28px;
    border-bottom: 1px solid #c5c3e0ff;
    text-align: center;
  }
  #platform .modal-title {
    font-size: 1.3rem;
    font-weight: 700;
    letter-spacing: 1px;
    margin: 0;
    text-align: left;
    margin-left: 18px;
  }
  #platform .modal-body {
    padding: 24px 32px;
    background: transparent;
    text-align: center;
  }
  #platform .modal-footer {
    background: #ebeafbff;
    border-radius: 0 0 18px 18px;
    padding: 16px 28px;
    border-top: 1px solid #c3c4e0ff;
    text-align: right;
  }
  #platform .btn-close, #platform .btn-default {
    border-radius: 8px;
    font-size: 14px;
    font-family: 'Poppins', Arial, sans-serif;
    padding: 8px 18px;
    box-shadow: 0 2px 8px rgba(211,47,47,0.08);
    transition: background 0.2s;
  }
  #platform .btn-default:hover {
    background: #3137ebe2;
    color: #fff;
  }

  @media (max-width: 768px) {
    #platform .modal-dialog {
      max-width: 95% !important;
      width: auto !important;
      margin: 10px auto;
    }

    #platform .modal-content {
      min-width: unset !important;
      width: 100% !important;
      border-radius: 12px;
    }

    #platform .modal-body {
      padding: 16px;
    }
  }
</style>

<div class="modal fade" id="platform">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="candidate"></span></b></h4>
            </div>
            <div class="modal-body">
              <p id="plat_view"></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>

<style>
  #view .modal-dialog {
    display: flex;
    align-items: center;
    min-height: 90vh;
    justify-content: center;
    max-width: 900px;
    width: 900px;
  }
  #view .modal-content {
    background: linear-gradient(135deg, #fffbe9 0%, #fbeaea 100%);
    color: #333;
    border-radius: 18px;
    box-shadow: 0 8px 32px rgba(211,47,47,0.18);
    font-family: 'Poppins', Arial, sans-serif;
    font-size: 16px;
    padding: 0;
    transition: box-shadow 0.3s;
    width: 60%;
  }
  #view .modal-header {
    background: #3137ebe2;
    color: #fff;
    border-radius: 14px 14px 0 0;
    padding: 18px 28px 12px 28px;
    border-bottom: 1px solid #c3c3e0ff;
    text-align: left;
  }
  #view .modal-title {
    font-size: 1.9rem;
    font-weight: 700;
    letter-spacing: 1px;
    margin: 0;
    text-align: left;
    margin-left: 4px;
    margin-bottom: 6px;
  }
  #view .modal-body {
    padding: 0px 32px;
    background: transparent;
    text-align: left;
  }
  #view .modal-footer {
    background: #ebeafbff;
    border-radius: 0 0 18px 18px;
    padding: 16px 28px;
    border-top: 1px solid #c3c3e0ff;
    text-align: right;
  }
  #view .btn-close, #view .btn-default {
    border-radius: 8px;
    font-size: 14px;
    font-family: 'Poppins', Arial, sans-serif;
    padding: 8px 18px;
    box-shadow: 0 2px 8px rgba(211,47,47,0.08);
    transition: background 0.2s;
  }
  #view .btn-default:hover {
    background: #3137ebe2;
    color: #fff;
  }
  .votelist-flex {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    padding: 10px 0;
    border-bottom: 1px solid #c3c8e0ff;
    font-size: 1rem;
  }
  .votelist-flex:last-child {
    border-bottom: none;
  }
  .votelist-label {
    flex: 0 0 auto;
    text-align: left;
    font-weight: 700;
    color: #1b22edff;
    padding-right: 18px;
    min-width: 160px;
    margin-right: 0;
    font-size: 1.6rem;
  }
  .votelist-value {
    flex: 1;
    text-align: left;
    color: #333;
    font-weight: 700px;
    margin-left: 20px;
    font-size: 1.5rem;
  }

  @media (max-width: 768px) {
    #view .modal-dialog {
      max-width: 90% !important;
      width: 90% !important;
      margin: auto;
    }

    #view .modal-content {
      width: 100% !important;
      border-radius: 14px;
      font-size: 14px;
    }

    #view .modal-title {
      font-size: 1.4rem;
    }

    #view .modal-body {
      padding: 12px 16px;
    }

    #view .modal-footer {
      padding: 12px 16px;
    }

    .votelist-label {
      font-size: 1.2rem;
      min-width: 120px;
      padding-right: 10px;
    }

    .votelist-value {
      font-size: 1.1rem;
      margin-left: 10px;
    }

    #view .btn-close, 
    #view .btn-default {
      font-size: 12px;
      padding: 6px 14px;
    }
  }
</style>

<div class="modal fade" id="view">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Your Votes</b></h4>
            </div>

            <div class="modal-body">
              <?php
                $id = $voter['id'];
                $sql = "SELECT *, candidates.firstname AS canfirst, candidates.lastname AS canlast FROM votes LEFT JOIN candidates ON candidates.id=votes.candidate_id LEFT JOIN positions ON positions.id=votes.position_id WHERE voters_id = '$id'  ORDER BY positions.priority ASC";
                $query = $conn->query($sql);
                while($row = $query->fetch_assoc()){
                  echo "
                    <div class='votelist-flex'>
                      <span class='votelist-label'>".htmlspecialchars($row['description'])." :</span>
                      <span class='votelist-value'>".htmlspecialchars($row['canfirst'])." ".htmlspecialchars($row['canlast']);
                  if (!empty($row['partylist'])) {
                    echo " <span style='font-size:0.95rem; color:#4682B4; font-weight:600;'>[ ".htmlspecialchars($row['partylist'])." Party List ]</span>";
                  }
                  echo "</span>
                    </div>
                  ";
                }
              ?>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-curve pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>
