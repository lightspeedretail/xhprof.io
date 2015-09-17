<?php
namespace ay\xhprof;

$saved_filters	= $xhprof_data_obj->getSavedFilters();
$current_filter = array(
	"id" => null,
	"name" => null,
);
if(!empty($_GET['xhprof']['filter']['id']))
{
	$current_filter = $xhprof_data_obj->getSavedFilterById($_GET['xhprof']['filter']['id']);
}

?>
<form action="" method="post" id="filter">
<div class="columns">
	<div class="column">
		<div class="label"><strong>Saved Filters :</strong></div>
		<ul>
			<?php foreach($saved_filters as $saved_filter): ?>
				<?php
					$saved_filter['filter']['filter']['id'] = $saved_filter['id'];
					$delete_filter['filter']['delete'] = $saved_filter['id'];
				?>
				<li>
					[<a href="<?= url($_GET['xhprof']['template'], null, $delete_filter)?>">Delete</a>] -
					<a href="<?= url($saved_filter['filter']['template'], null, $saved_filter['filter'])?>"><?= $saved_filter['name'] ?></a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
	<div class="column">
		<label class="row query-host_id-input input-text">
			<div class="label">Save Current Filter</div>
			<input type="text" value="<?= $current_filter['name'] ?>" name="ay[filter][name]">
			<input type="hidden" value="<?= $current_filter['id'] ?>" name="ay[filter][id]">
		</label>
		<div class="buttons">
			<input type="submit" value="Save Filter">
		</div>

	</div>
</div>
</form>
