<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>

<div class="card">
  <div class="card-body">
  <h3 class="card-title">Countries</h5>

    <table class="table" style="width: 70rem;" border=0>
      <tr>
          <th scope="col" style="width: 10rem;">Land</th>
          <th scope="col" style="width: 5rem;">Code</th>
          <th scope="col" style="width: 10rem;">Hoofdstad</th>
          <th scope="col" style="width: 10rem;">Werelddeel</th>
          <th scope="col" style="width: 10rem;">Languages</th>
          <th scope="col" style="text-align: right;width: 10rem;">Inwoners</th>
          

      </tr>
      <?php foreach ($countries as $country): 
      // dd($country->countryLanguages)
        ?>
        <tr>
            <td><?= $country->Name ?></td>
            <td><?= $country->Code ?></td>
            <td><?php
              if ($country->capital) { // note: f.e. Antartica has no Capital
                echo $country->capital->Name;
              } else {
                echo "-";
              }
            ?></td>
            <td><?= dd($country->werelddeel) ?></td>
            <td>
            <?php foreach ($country->countryLanguages as $language): ?>
  <div class="row">
    <div class="col-md-8"><?= $language->Language ?></div>
    <div class="col-md-4"><?= $language->Percentage ?></div>
  </div>
<?php endforeach; ?>
            </td>
            <td style="text-align: right"><?= number_format($country->Population, 0, ',', ' '); ?></td>
        </tr>
      <?php endforeach; ?>
    </table>

  </div>
</div>

<?= LinkPager::widget(['pagination' => $pagination]) ?>