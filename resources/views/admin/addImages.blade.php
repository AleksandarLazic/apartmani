<div class="col-xs-12 col-lg-4">
	<div class="button" ngf-select ng-model="files" ngf-multiple="true">Select</div>
	<div ng-repeat="file in files">
		<img class="col-xs-12 col-lg-4" ngf-src="file" class="thumb">
		<button ng-click="remove($index)">Remove</button>
	</div>
</div>