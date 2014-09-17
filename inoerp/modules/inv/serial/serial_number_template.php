<div id="all_contents">
 <div id="content_left"></div>
 <div id="content_right">
  <div id="content_right_left">
   <div id="content_top"></div>
   <div id="content">
    <div id="structure">
     <div id="inv_serial_number_divId">
      <!--    START OF FORM HEADER-->
      <div class="error"></div><div id="loading"></div>
      <div class="show_loading_small"></div>
      <?php echo (!empty($show_message)) ? $show_message : ""; ?> 
      <!--    End of place for showing error messages-->

      <form action=""  method="post" id="inv_serial_number"  name="inv_serial_number"><span class="heading">Serial Number </span>
       <div id ="form_header">
        <div id="tabsHeader">
         <ul class="tabMain">
          <li><a href="#tabsHeader-1">Basic Info</a></li>
          <li><a href="#tabsHeader-2">Attachments</a></li>
          <li><a href="#tabsHeader-3">Notes</a></li>
         </ul>
         <div class="tabContainer">
          <div id="tabsHeader-1" class="tabContent">
           <div class="large_shadow_box"> 
            <ul class="column four_column"> 
             <li> <label><img src="<?php echo HOME_URL; ?>themes/images/serach.png" class="inv_serial_number_id select_popup clickable">
               Serial Id : </label><?php $f->text_field_dsr('inv_serial_number_id') ?>
              <a name="show" href="form.php?class_name=inv_serial_number" class="show inv_serial_number_id">	<img src="<?php echo HOME_URL; ?>themes/images/refresh.png" class="clickable"></a> 
             </li>
             <li><label>Inventory Org </label>
              <?php echo $f->select_field_from_object('org_id', org::find_all_inventory(), 'org_id', 'org', $$class->org_id, 'org_id', '', 1, $readonly1); ?>
             </li>
             <li><label> <?php
                if (empty($$class->inv_serial_number_id)) {
                 echo "<img src='" . HOME_URL . "themes/images/serach.png' class='select_item_number select_popup clickable'>";
                }
               ?> Item Number(2) : </label>
              <?php echo $f->hidden_field_withId('item_id_m', $$class->item_id_m); ?>
              <?php
               if (empty($$class->inv_serial_number_id)) {
                $f->text_field_d('item_number', 'select_item_number');
               } else {
                $f->text_field_dr('item_number');
               }
              ?>
             </li>
             <li><label>Item Description: </label>
              <?php $f->text_field_dr('item_description'); ?>
             </li>
             <li><label>Serial Number :</label><?php $f->text_field_d('serial_number'); ?></li>
             <li><label>Status </label>
              <?php echo $f->select_field_from_object('status', inv_serial_number::serail_status(), 'option_line_code', 'option_line_value', $$class->status, 'status', '', 1, 1); ?>
             </li>
             <li><label>Generation : </label> 
              <?php echo $f->select_field_from_array('generation', item::$ls_generation_a, $$class->generation, '', 'generation', '', 1, 1); ?>
             </li> 
             <li><label>Description :</label><?php $f->text_field_d('description'); ?> 					</li>
            </ul>
           </div>
          </div>
          <div id="tabsHeader-2" class="tabContent">
           <div> <?php echo ino_attachement($file) ?> </div>
          </div>
          <div id="tabsHeader-3" class="tabContent">
           <div id="comments">
            <div id="comment_list">
             <?php echo!(empty($comments)) ? $comments : ""; ?>
            </div>
            <div id ="display_comment_form">
             <?php
              $reference_table = 'inv_serial_number';
              $reference_id = $$class->inv_serial_number_id;
             ?>
            </div>
            <div id="new_comment">
            </div>
           </div>
           <div> 
           </div>
          </div>

         </div>

        </div>
       </div>
       <div id ="form_line" class="form_line"><span class="heading">Serial Number Details </span>
        <div id="tabsLine">
         <ul class="tabMain">
          <li><a href="#tabsLine-1">Current</a></li>
          <li><a href="#tabsLine-2">References</a></li>
          <li><a href="#tabsLine-3">Transactions</a></li>
         </ul>
         <div class="tabContainer"> 
          <div id="tabsLine-1" class="tabContent">
           <div> 
            <ul class="column four_column"> 
             <li><label>Origination Type : </label>
              <?php echo $f->select_field_from_array('origination_type', inv_serial_number::$origination_type_a, $$class->origination_type,'origination_type','',1,1, 1); ?>             </li>
             <li><label>Origination Date : </label>
              <?php echo $f->date_fieldAnyDay_r('origination_date', $$class->origination_date, 1); ?>
             </li>
             <li><label>Activation Date : </label>
              <?php echo $f->date_fieldAnyDay_r('activation_date', $$class->activation_date, 1); ?>
             </li>
             <li><label>Current Inventory: </label>
              <?php echo $f->select_field_from_object('current_org_id', org::find_all_inventory(), 'org_id', 'org', $$class->current_org_id, 'current_org_id', '', '', 1); ?>
             </li>
             <li><label>Sub inventory :</label>
              <?php echo $f->select_field_from_object('current_subinventory_id', subinventory::find_all_of_org_id($$class->current_org_id), 'subinventory_id', 'subinventory', $$class->current_subinventory_id, 'current_subinventory_id', 'subinventory_id', '', 1); ?>			</li>
             <li><label>Locator: </label> 
              <?php echo $f->select_field_from_object('current_locator_id', locator::find_all_of_subinventory($$class->current_subinventory_id), 'locator_id', 'locator', $$class->current_locator_id, '', 'locator_id', '', 1); ?>
             </li>
             <li><label>Inventory L/N : </label> <?php $f->text_field_d('inv_lot_number_id'); ?>             </li>
             <li><label>COO : </label> <?php $f->text_field_d('country_of_origin'); ?>             </li>
             <li><label>Parent Id : </label> <?php $f->text_field_d('parent_serial_number_id'); ?>             </li>
            </ul> 
           </div> 
          </div> 
          <div id="tabsLine-2" class="tabContent">
           <div> 
            <ul class="column four_column"> 
             <li><label>Supplier Site Id : </label> <?php $f->text_field_dr('supplier_site_id'); ?>             </li>
             <li><label>PO Header Id : </label> <?php $f->text_field_dr('po_header_id'); ?>             </li>
             <li><label>Supplier S/N : </label> <?php $f->text_field_dr('supplier_sn'); ?>             </li>
             <li><label>Supplier L/N : </label> <?php $f->text_field_dr('supplier_ln'); ?>             </li>
             <li><label>First Tnx Id : </label> <?php $f->text_field_dr('first_inv_transaction_id'); ?>             </li>
             <li><label>Last Trnx Id : </label> <?php $f->text_field_dr('last_inv_transaction_id'); ?>             </li>
             <li><label>Customer Site Id : </label> <?php $f->text_field_dr('ar_customer_site_id'); ?>             </li>
            </ul> 
           </div> 
          </div> 
          <div id="tabsLine-3"  class="tabContent">
           <div> 
            <ul class="column five_column">
             <li id="document_print"><label>Transaction : </label> <?php // echo $result_stmt;      ?>	</li>
            </ul>
           </div> 
          </div>
         </div>
        </div> 
       </div> 
      </form>

      <!--END OF FORM HEADER-->

     </div>
    </div>
    <!--   end of structure-->
   </div>
   <div id="content_bottom"></div>
  </div>
  <div id="content_right_right"></div>
 </div>

</div>
<div id="js_data">
 <ul id="js_saving_data">
  <li class="headerClassName" data-headerClassName="inv_serial_number" ></li>
  <li class="savingOnlyHeader" data-savingOnlyHeader="true" ></li>
  <li class="primary_column_id" data-primary_column_id="inv_serial_number_id" ></li>
  <li class="form_header_id" data-form_header_id="inv_serial_number" ></li>
 </ul>
 <ul id="js_contextMenu_data">
  <li class="docHedaderId" data-docHedaderId="inv_serial_number_id" ></li>
  <li class="btn1DivId" data-btn1DivId="inv_serial_number_id" ></li>
 </ul>
</div>

<?php include_template('footer.inc') ?>