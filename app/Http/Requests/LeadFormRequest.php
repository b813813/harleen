<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use App\Http\Requests\Request;

class LeadFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'lead.play_id' => 'required',
            'lead.basin_name' => 'sometimes|required',
            'lead.province_name' => 'required',
            'lead.structure_name' => 'required',
            'lead.closure_name' => 'required',
            'lead.latitude_degree' => 'required|numeric|min:0|max:20',
            'lead.latitude_minute' => 'required|numeric|min:0|max:59',
            'lead.latitude_second' => 'required|numeric|min:0|max:59',
            'lead.latitude_cardinal' => 'required|in:s,S,n,N',
            'lead.longitude_degree' => 'required|numeric|min:90|max:145',
            'lead.longitude_minute' => 'required|numeric|min:0|max:59',
            'lead.longitude_second' => 'required|numeric|min:0|max:59',
            'lead.clarified' => 'required',
            'lead.initiate' => 'required|date',
            'lead.shore' => 'required',
            'lead.terrain' => 'required',
            'lead.nearby_field' => 'required',
            'lead.nearby_infra' => 'required',
            'lead.update_reason' => 'sometimes|required',
            'lead.survey' => 'required',
            'lead.s2_low' => 'numeric|min:1',
            'lead.s2_best' => 'required_if:lead.s2_data,checked|numeric|min:1',
            'lead.s2_high' => 'numeric|min:1',
            'lead.geo_low' => 'numeric|min:1',
            'lead.geo_best' => 'required_if:lead.s2_data,checked|numeric|min:1',
            'lead.geo_high' => 'numeric|min:1',
            'lead.chem_low' => 'numeric|min:1',
            'lead.chem_best' => 'required_if:lead.s2_data,checked|numeric|min:1',
            'lead.chem_high' => 'numeric|min:1',
            'lead.grav_low' => 'numeric|min:1',
            'lead.grav_best' => 'required_if:lead.s2_data,checked|numeric|min:1',
            'lead.grav_high' => 'numeric|min:1',
            'lead.elec_low' => 'numeric|min:1',
            'lead.elec_best' => 'required_if:lead.s2_data,checked|numeric|min:1',
            'lead.elec_high' => 'numeric|min:1',
            'lead.resi_low' => 'numeric|min:1',
            'lead.resi_best' => 'required_if:lead.s2_data,checked|numeric|min:1',
            'lead.resi_high' => 'numeric|min:1',
            'lead.oter_low' => 'numeric|min:1',
            'lead.oter_best' => 'required_if:lead.s2_data,checked|numeric|min:1',
            'lead.oter_high' => 'numeric|min:1',
            'gcf.src_data' => 'required',
            'gcf.res_data' => 'required',
            'gcf.trp_data' => 'required',
            'gcf.dyn_data' => 'required'
        ];
    }

    /**
     * Modifikasi data input sebelum divalidasi, input juga akan diteruskan ke
     * LeadController untuk mengurangi modifikasi input sebelum menyimpan ke
     * database.
     *
     * @return Validator
     */
    public function getValidatorInstance()
    {
        $input = $this->all();

        // Menentukan jika kontraktor mengisi survey atau tidak
        // sama sekali
        if (!array_key_exists('s2_data', $input['lead'])
            && !array_key_exists('geo_data', $input['lead'])
            && !array_key_exists('chem_data', $input['lead'])
            && !array_key_exists('grav_data', $input['lead'])
            && !array_key_exists('elec_data', $input['lead'])
            && !array_key_exists('resi_data', $input['lead'])
            && !array_key_exists('oter_data', $input['lead'])
        ) {
            $input['lead']['survey'] = null;
        } else {
            $input['lead']['survey'] = 1;
        }

        // Menggabungkan 3 field "Initiation date" menjadi satu field
        $input['lead']['initiate'] = Carbon::createFromDate(
            $input['lead']['initiate']['year'],
            $input['lead']['initiate']['month'],
            $input['lead']['initiate']['day']
        )->toDateString();

        $input['lead']['latitude'] = $input['lead']['latitude_degree']
            . "," . $input['lead']['latitude_minute']
            . "," . $input['lead']['latitude_second']
            . "," . $input['lead']['latitude_cardinal'];

        $input['lead']['longitude'] = $input['lead']['longitude_degree']
            . "," . $input['lead']['longitude_minute']
            . "," . $input['lead']['longitude_second'] . ",E";

        $this->getInputSource()->replace($input);

        return parent::getValidatorInstance();
    }
}
