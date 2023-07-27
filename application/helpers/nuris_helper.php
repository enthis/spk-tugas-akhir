<?php
function cmb_dinamis($name, $table, $field, $pk, $selected, $options = '', $where = null)
{
    $ci = get_instance();
    $cmb = "<select " . $options . " name='$name' id='$name' class='form-control'>";
    if ($where) {
        $ci->db->where($where[0], $where[1]);
    }
    $data = $ci->db->get($table);
    foreach ($data->result() as $d) {
        if ($options != 'readonly') {

            $cmb .= "<option value='" . $d->$pk . "'";
            $cmb .= $selected == $d->$pk ? " selected='selected'" : '';
            $cmb .= ">" .  strtoupper($d->$field) . "</option>";
        } else {
            if ($selected == $d->$pk) {
                $cmb .= "<option value='" . $d->$pk . "'";
                $cmb .= $selected == $d->$pk ? " selected='selected'" : '';
                $cmb .= ">" .  strtoupper($d->$field) . "</option>";
            }
        }
    }
    $cmb .= "</select>";

    return $cmb;
}

function cmb_dinamis_array($name, $data, $selected, $options = '')
{
    $ci = get_instance();
    $cmb = "<select " . $options . " name='$name' id='$name' class='form-control'>";
    
    foreach ($data as $k => $d) {
        if ($options != 'readonly') {

            $cmb .= "<option value='" . $k . "'";
            $cmb .= $selected == $k ? " selected='selected'" : '';
            $cmb .= ">" .  strtoupper($d) . "</option>";
        } else {
            if ($selected == $k) {
                $cmb .= "<option value='" . $k . "'";
                $cmb .= $selected == $k ? " selected='selected'" : '';
                $cmb .= ">" .  strtoupper($d) . "</option>";
            }
        }
    }
    $cmb .= "</select>";

    return $cmb;
}