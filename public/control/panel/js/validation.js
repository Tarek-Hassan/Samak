
$("#addProductForm").submit(function(e){
    $('#addProductForm input.required,#addProductForm textarea.required,#addProductForm select.required').each(function(){
        if(this.type=='checkbox'){
        	if(this.checked){}
        	else{
        		toastr.error('Please Enter '+ this.id);
                e.preventDefault();  
                $(this).css('outline', '1px solid red');  
                $(this).attr('onchange', 'ChangeInputOutline('+this.id+')');  
                this.focus();         
            }
        }
        else{
        	if(this.value == null || this.value == '' || this.value == " " ){
                toastr.error('Please Enter '+ this.id);
                e.preventDefault();  
                $(this).css('outline', '1px solid red');  
                $(this).attr('onchange', 'ChangeInputOutline('+this.id+')');  
                this.focus();
                

	        }
	        if(this.min !== null && this.min !== '' && this.min !== " "){
	            if(this.value.length < this.min){
	                toastr.error(this.id+' minimum char or length is '+this.min);
	                e.preventDefault();  
	                $(this).css('outline', '1px solid red');  
	                $(this).attr('onchange', 'ChangeInputOutline('+this.id+')');  
	                this.focus();
	            }
	        }

	        if(this.max !== null && this.max !== '' && this.max !== " "){
	            if(this.value.length > this.max){
	                toastr.error(this.id+' maximum char or length is '+this.max);
	                e.preventDefault();  
	                $(this).css('outline', '1px solid red');  
	                $(this).attr('onchange', 'ChangeInputOutline('+this.id+')');  
	                this.focus();
	            }
	        }
        }
        
    });
});


function ChangeInputOutline(id){
	$(id).css('outline', 'none');  
}


