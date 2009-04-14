/*
		* Main Reports Javascript
		*/	
		
		$(document).ready(function()
		{		
			$(".hide").click(function () {
				$("#submitStatus").hide();
				return false;
			});
		});
		
		// Check All / Check None
		function CheckAll( id, name )
		{
			$("INPUT[@name='" + name + "'][type='checkbox']").attr('checked', $('#' + id).is(':checked'));
		}
		
		// Ajax Submission
		function reportAction ( action, confirmAction, incident_id )
		{
			var statusMessage;
			if( !isChecked( "incident" ) && incident_id=='' )
			{ 
				alert('Please select at least one report.');
			} else {
				var answer = confirm('Are You Sure You Want To ' + confirmAction + ' items?')
				if (answer){
					// Set Submit Type
					$("#action").attr("value", action);
					
					if (incident_id != '') 
					{
						// Submit Form For Single Item
						$("#incident_single").attr("value", incident_id);
						$("#reportMain").submit();
					}
					else
					{
						// Set Hidden form item to 000 so that it doesn't return server side error for blank value
						$("#incident_single").attr("value", "000");
						// Submit Form For Multiple Items
						$("input[@name='incident_id[]'][@checked]").each(
							function() 
							{
								$("#reportMain").submit();
							}
						);
					}
				
				} else {
					return false;
				}
			}
		}
		
		//check if a checkbox has been ticked.
		function isChecked( id )
		{
			var checked = $("input[@id="+id+"]:checked").length
			
			if( checked == 0 )
			return false
			
			else 
			return true
		}