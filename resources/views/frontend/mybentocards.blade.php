@extends('frontend.layouts.main')

@section('content')


<style>
.tab-content{
    margin-top:10px;
}
.custom_box
{
		border: 1px solid #abaaaa;
	      border-radius: 1px !important;
}
.name_overflow{
 width:300px !important;
overflow:hidden !important;
text-overflow:ellipsis !important;
}



.row_ul {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  width: 100%;
}
.column_li {
  display: flex;
  flex-direction: column;
  flex-basis: 100%;
  flex: 1;
}
.mal p{
    font-size:12px;
}
.mal h4{
    font-size:16px;
}
</style>
<section class="content">
<!-- Main content -->
<section class="row">
<div class="row">
            
        <div class="col-md-3">

		  @php
           $menu = 'mybentocards'
           @endphp
           @include('frontend.layouts.profile_menu')
		
	    </div>
	
        
        
       <div class="col-md-9">
           
        <div class='row'>
            
            <!--
	        <div class="col-md-12 col-sm-12 col-xs-12" >
        		<div class="box box-primary">
        			<div class="box-header with-border">
        			    <i class="fa fa-fw fa-briefcase"></i><h3 class="box-title">My Points</h3>
        			</div>
        			<div class="box-body">
        				<div class="row text-center">
        					<div class="col-md-12">
                                <h5 class="my-3">Claimed Points</h5>
        						<h1 class="my-3 display-4">
        							<span class="text-success">{{ (@$points_amount > 0) ? $points_amount : 0}}</span>
        						</h1>
        						
        						<button class="btn btn-info btn-transfer_points">Transfer Points</button>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
	    </div>
	    -->
	    
	    
        	    <div class='row'>
        	        <div class="col-md-12 col-sm-12 col-xs-12" >
                          <div class="box box-primary">
                	        <div class="box-header with-border"> Bento Card Information </div>
                				<div class="box-body">
    								<div class="table-responsive-define">
    									<table id="bentoCard" class="table">
                                            <thead>
                                                <tr>
                                                    <th>Card ID</th>
                                                    <th>Card Number</th>
                                                    <th>Name</th>
                                                    <th>Amount</th>
                                                    <th>Expiration</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
    								</div>
    					    	</div>
                		</div>
                	</div>
                </div>
            
    	</div>
    
    	
    </div>
    

</div>
</section>
</section> 

<script>
$(document).ready(function() {

    var t = $('#bentoCard').DataTable({
        "processing" : true,
           "ajax" : {
			 "url" : "https://fncc.herokuapp.com/api/cardByName",
			 "dataSrc" : function (json) {
                    var cardsp = json.cards;
                    return cardsp;
					},
    		  "data" : {'fullname': "Kenneth Amaro"},
    		  "type": "post",
		    },
		    
		    "columns" : [
        				{ "data" : "cardId" }, 
        				
        				{
		
			                 "render": function ( data, type, full, meta ) {
	
								 var data = "****"+full.lastFour
			                     return data;
			                 }
			            },
        				
        				
        	
        				
        				{ "data" : "alias" },
        				{ "data" : "availableAmount" },
        				{ "data" : "expiration" }
					
			 ]
    });
    
});    
</script>
	   
	

@endsection

