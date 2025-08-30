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

<!-- Platform -->
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
    background: linear-gradient(135deg, #fffbe9 0%, #fbeaea 100%);
    color: #333;
    border-radius: 18px;
    box-shadow: 0 8px 32px rgba(211,47,47,0.18);
    padding: 0;
    font-family: 'Poppins', Arial, sans-serif;
    font-size: 16px;
    transition: box-shadow 0.3s;
  }
  #platform .modal-header {
    background: #d32f2f;
    color: #fff;
    border-radius: 18px 18px 0 0;
    padding: 18px 28px 12px 28px;
    border-bottom: 1px solid #e0d6c3;
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
    background: #fbeaea;
    border-radius: 0 0 18px 18px;
    padding: 16px 28px;
    border-top: 1px solid #e0d6c3;
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
    background: #d32f2f;
    color: #fff;
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


<!-- Enhanced View Ballot Modal -->
<style>
  #view .modal-dialog {
  display: flex;
  align-items: center;
  min-height: 80vh;
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
  background: #d32f2f;
  color: #fff;
  border-radius: 18px 18px 0 0;
  padding: 18px 28px 12px 28px;
  border-bottom: 1px solid #e0d6c3;
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
    background: #fbeaea;
    border-radius: 0 0 18px 18px;
    padding: 16px 28px;
    border-top: 1px solid #e0d6c3;
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
    background: #d32f2f;
    color: #fff;
  }
  .votelist-flex {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    padding: 10px 0;
    border-bottom: 1px solid #e0d6c3;
    font-size: 1rem;
  }
  .votelist-flex:last-child {
    border-bottom: none;
  }
  .votelist-label {
  flex: 0 0 auto;
  text-align: left;
  font-weight: 700;
  color: #d32f2f;
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
                      <span class='votelist-value'>".htmlspecialchars($row['canfirst'])." ".htmlspecialchars($row['canlast'])."</span>
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
