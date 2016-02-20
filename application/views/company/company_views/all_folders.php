<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 "> <!-- right part-->
      <div class="clearfix"></div>
          <div class="white-box-right">
           <div class="pull-right right20 primary-btn ad-apply-btn"  data-toggle="modal" data-target="#myModal">Create Folder</div>
           <h4>My Personal Folder<small>(Create/Modify/Delete Personal Folders)</small></h4>
           <div class="prf-col2 margin-thirty"></div>

          <div class="col-xs-12">
           <div class="col-xs-1 margin-ten">View</div>
            <div class="col-xs-3 margin-ten">
               <select class="form-control">
                <option value="1">10</option>
                <option value="2">20</option>
                <option value="3">30</option>
                <option value="4">40</option>
                <option value="5">50</option>
                <option value="6">60</option>
                <option value="7">70</option>
                <option value="8">80</option>
              </select></div>
              <div class="col-xs-4">per page</div> 
           </div>

          <div class="clearfix"></div>

           <div class="col-xs-12 gray-padding">

           <div class="col-xs-4 border-side">
            <span class="margin-seven"><strong>Folder Name</strong></span>
            </div>
           <div class="col-xs-2 border-side margin-five"><strong>Rename</strong></div>
           <div class="col-xs-2 border-side"><strong>Delete</strong></div>
           <div class="col-xs-2 border-side"><strong>Created By</strong></div>
           <div class="col-xs-2"><strong>Count</strong></div>
           </div>

           <div class="col-xs-12 white-padding">
           <div class="col-xs-4"><input type="checkbox"><span class="margin-seven"><a href="content-writer.php">Content Writer</a></span>
           </div>
           <div class="col-xs-2"><a href="#" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil font-img-size"></i></a></div>
           <div class="col-xs-2"><i class="fa fa-trash-o font-img-size"></i></div>
           <div class="col-xs-2">Self</div>
           <div class="col-xs-2">0</div>
           </div>

           <div class="col-xs-12 white-padding">
           <div class="col-xs-4"><input type="checkbox"><span class="margin-seven"><a href="content-writer.php">Rohit</a></span>
           </div>
           <div class="col-xs-2"><a href="#" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil font-img-size"></i></a></div>
           <div class="col-xs-2"><i class="fa fa-trash-o font-img-size"></i></div>
           <div class="col-xs-2">Self</div>
           <div class="col-xs-2">0</div>
           </div>



           <!--Open Popup for folder-->

            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog">
              <div class="modal-content">
              <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel">Add Folder</h4>
				<div class="col-lg-4 pull-right text-danger">* <i>Indicates required field</i></div>
              </div>
              <div class="modal-body">
              <div class="col-xs-12 margin-ten">
              <div class="col-xs-3">Folder Name <span class="text-danger">*</span></div>
              <div class="col-xs-6">
               <input type="text" class="input-width form-control" placeholder="Enter folder name">
              </div>
              </div>
      </div>
    <div class="modal-footer1">
        <div class="primary-btn ad-apply-btn" >Add Folder</div>
        <div class="primary-btn ad-apply-btn" data-dismiss="modal">Cancel</div>
    </div>

  </div>

           <!-- /.modal-content -->

  </div>

        <!-- /.modal-dialog -->

  </div>

           <!--Closed Popup For Folder-->
           
           <!--Rename Popup for folder-->

            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog">
              <div class="modal-content">
              <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel">Rename Folder</h4>
				<div class="col-lg-4 pull-right text-danger">* <i>Indicates required field</i></div>
              </div>
              <div class="modal-body">
              <div class="col-xs-12 margin-ten">
              <div class="col-xs-3">Folder Name <span class="text-danger">*</span></div>
              <div class="col-xs-6">
               <input type="text" class="input-width form-control" value="Content Writer">
              </div>
              </div>



      </div>

    <div class="modal-footer1">
        <div class="primary-btn ad-apply-btn" >Rename</div>
        <div class="primary-btn ad-apply-btn" data-dismiss="modal">Cancel</div>
    </div>
  </div>

           <!-- /.modal-content -->

  </div>

        <!-- /.modal-dialog -->

  </div>

           <!--Rename Popup For Folder-->



      <div class="col-lg-12"><!--Pagination Start-->

         <ul class="pagination pull-right">

      <li id="dataTables-example_previous" tabindex="0" aria-controls="dataTables-example" 

      class="paginate_button previous"><a href="#">Previous</a></li>

      <li tabindex="0" aria-controls="dataTables-example" class="paginate_button active">

      <a href="#">1</a></li>

      <li tabindex="0" aria-controls="dataTables-example" class="paginate_button"><a href="#">2</a></li>

      <li tabindex="0" aria-controls="dataTables-example" class="paginate_button"><a href="#">3</a></li>

      <li tabindex="0" aria-controls="dataTables-example" class="paginate_button"><a href="#">4</a></li>

      <li tabindex="0" aria-controls="dataTables-example" class="paginate_button"><a href="#">5</a></li>

      <li tabindex="0" aria-controls="dataTables-example" class="paginate_button"><a href="#">6</a></li>

      <li id="dataTables-example_next" tabindex="0" aria-controls="dataTables-example" 

      class="paginate_button next disabled"><a href="#">Next</a></li>



     </ul>

     </div><!--Pagination End-->



    </div>

  </div>