							<div class="KalHariLibur" id="KalHariLibur">
								Calendar goes here
							</div>
							<div class="modal modal-fade in" id="event-modal" style="display: none; padding-right: 16px; background-color: rgba(0,0,0,0.4);">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
											<h4 class="modal-title">
												Event
											</h4>
										</div>
										<div class="modal-body">
											<input type="hidden" name="event-index" value="">
											<form class="form-horizontal">
												<div class="form-group">
													<label for="min-date" class="col-sm-3 control-label">Keterangan</label>
													<div class="col-sm-8">
														<input name="event-name" type="text" class="form-control">
													</div>
												</div>
												<div class="form-group">
													<label for="min-date" class="col-sm-3 control-label">Tanggal</label>
													<div class="col-sm-8">
														<div class="input-group input-daterange" data-provide="datepicker">
															<input name="event-start-date" type="date" class="form-control" value="2012-04-05" style="width: 170px;">
															<span class="input-group-addon">to</span>
															<input name="event-end-date" type="date" class="form-control" value="2017-04-09" style="width: 160px;">
														</div>
													</div>
												</div>
											</form>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
											<button type="button" class="btn btn-primary" id="save-event">
												Save
											</button>
										</div>
									</div>
								</div>
							</div>