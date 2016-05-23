/* variables shown in level2 with a warning that cannot be calculated*/

var Level2Warnings=
{
	"wsg_KPI_std_nrg_":     translate("edit_advanced_inputs_required"),
	"wwg_KPI_std_nrg_":     translate("edit_advanced_inputs_required"),
	"wsa_KPI_std_nrg_cons": translate("edit_advanced_inputs_required"),
	"wsa_KPI_std_nrg_recv": translate("edit_advanced_inputs_required"),
	"wsd_KPI_std_nrg_cons": translate("edit_advanced_inputs_required"),
	"wwc_KPI_std_nrg_cons": translate("edit_advanced_inputs_required"),
	"wwd_KPI_std_nrg_cons": translate("edit_advanced_inputs_required"),
	"wwd_KPI_std_nrg_recv": translate("edit_advanced_inputs_required"),
}

Level2Warnings.isIn=function(code)
{
	for(var field in this)
	{
		if(field==code)
		{
			return true;
			break;
		}
	}
	return false;
}
