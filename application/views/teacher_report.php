<br/><br/><br/>
<?php
  //print_r($reportData);
?>
<div class="container">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Monthly Report</th>
        <th scope="col">Generate</th>
      </tr>
    </thead>
    <tbody>

      <?php
      $k = 1;
      foreach($reportData as $rows){
      ?>
      <tr>
        <th scope="row"><?php echo $k;?></th>
        <td><?php echo $rows->attendance_data; ?></td>
        <td><a href="<?php echo base_url('index.php/report/report_pdf/'.$rows->assign_id.'/'.$rows->attendance_data)?>">View Report</a></td>
      </tr>
      <?php
      $k++;
    }
      ?>
    </tbody>
  </table>
</div>
