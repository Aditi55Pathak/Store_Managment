<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Gpbhujst
{
    private $CI;
    function __construct()
    {
        $this->CI = &get_instance();
    }
    public function isLoggedIn()
    {
        return ($_SESSION["LOGGEDIN"] == true) ? true : false;
    }
    public function getList($query, $cols)
    {
        $data = $this->CI->db->query($query);
        $coldata = '';
        $rowdata = '';
        $coldata .= '<tr>';
        foreach ($cols as $key => $value) {
            if ($value == 'id')
                $coldata .= '<th  class="th-sm">#</th>';
            else
                $coldata .= '<th  class="th-sm">' . ucwords(str_replace("_", " ", $value)) . '</th>';
        }
        $coldata .= '</tr>';
        foreach ($data->result() as $row) {
            $rowdata .= '<tr style="cursor: pointer;" class="clickablerow" data-id=' . $row->id . '>';
            foreach ($cols as $key => $value) {
                $rowdata .= '<td>' . $row->$value . '</td>';
            }
            $rowdata .= '</tr>';
        }

        return array('row' => $rowdata, 'col' => $coldata);
    }
    public function getListSerial($query, $cols)
    {
        $data = $this->CI->db->query($query);
        $coldata = '';
        $rowdata = '';
        $coldata .= '<tr>';
        foreach ($cols as $key => $value) {
            if ($value == 'id')
                $coldata .= '<th  class="th-sm">#</th>';
            else
                $coldata .= '<th  class="th-sm">' . ucwords(str_replace("_", " ", $value)) . '</th>';
        }
        $coldata .= '</tr>';
        $i = 1;
        foreach ($data->result() as $row) {
            $rowdata .= '<tr style="cursor: pointer;" class="clickablerow" data-id=' . $row->id . '>';
            foreach ($cols as $key => $value) {
                if ($value == 'id')
                    $rowdata .= "<td>$i</td>";
                else
                    $rowdata .= '<td>' . $row->$value . '</td>';
            }
            $rowdata .= '</tr>';
            $i++;
        }

        return array('row' => $rowdata, 'col' => $coldata);
    }
    public function getDate($dt)
    {
        return date("Y-m-d", strtotime($dt));
    }
    public function getCombo($query, $id, $value)
    {
        $result = $this->CI->db->query($query);
        $data = "";
        foreach ($result->result() as $row) {
            $data .= "<option value='" . $row->$id . "'>" . $row->$value . "</option>";
        }
        return $data;
    }
    public function getQuestionCard($id, $qno, $q, $op1, $op2, $op3, $op4, $mark, $co)
    {
        return '
        <div class="question">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3 row">
                            <div class="col-10">
                                <div class="row">
                                    <label for="formFile" class="form-label col-1 op"><b>' . $qno . '.</b></label>
                                    <label for="formFile" class="form-label col-11">' . $q . '</label>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="row">
                                    <label for="formFile" class="form-label col-12 co"><b>' . $co . '</b></label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-1 offset-md-1"></div>
                            <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" ' . (($mark == "A") ? "checked='checked'" : "") . ' value="A#' . $id . '" name="' . $id . '#Input">
                                    <label class="form-check-label" >
                                        ' . $op1 . '
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" ' . (($mark == "B") ? "checked='checked'" : "") . ' value="B#' . $id . '" name="' . $id . '#Input">
                                    <label class="form-check-label">
                                        ' . $op2 . '
                                    </label>
                                </div>
                            </div>

                        </div>
                        <div class="mb-3 row">
                            <div class="col-1 offset-md-1"></div>
                            <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" ' . (($mark == "C") ? "checked='checked'" : "") . ' value="C#' . $id . '" name="' . $id . '#Input" >
                                    <label class="form-check-label">
                                        ' . $op3 . '
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" ' . (($mark == "D") ? "checked='checked'" : "") . ' value="D#' . $id . '" name="' . $id . '#Input" >
                                    <label class="form-check-label">
                                        ' . $op4 . '
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ';
    }
    public function getQuestionCardDisabled($id, $qno, $q, $op1, $op2, $op3, $op4, $mark, $co, $ans)
    {
        return '
        <div class="question">
                <div class="card ' . (($ans == "R") ? "text-white bg-success" : "text-white bg-danger") . '">
                    <div class="card-body">
                        <div class="mb-3 row">
                            <div class="col-10">
                                <div class="row">
                                    <label for="formFile" class="form-label col-1 op"><b>' . $qno . '.</b></label>
                                    <label for="formFile" class="form-label col-11">' . $q . '</label>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="row"> 
                                    <label for="formFile" class="form-label col-12 "><b>' . $co . (($ans == "R") ? " <i class='fa fa-check fa-xl'></i>" : " <i class='fa fa-times fa-xl'></i>") . '</b></label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-1 offset-md-1"></div>
                            <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" disabled type="radio" ' . (($mark == "A") ? "checked='checked'" : "") . ' value="A#' . $id . '" name="' . $id . '#Input">
                                    <label class="form-check-label" >
                                        ' . $op1 . '
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" disabled type="radio" ' . (($mark == "B") ? "checked='checked'" : "") . ' value="B#' . $id . '" name="' . $id . '#Input">
                                    <label class="form-check-label">
                                        ' . $op2 . '
                                    </label>
                                </div>
                            </div>

                        </div>
                        <div class="mb-3 row">
                            <div class="col-1 offset-md-1"></div>
                            <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" disabled type="radio" ' . (($mark == "C") ? "checked='checked'" : "") . ' value="C#' . $id . '" name="' . $id . '#Input" >
                                    <label class="form-check-label">
                                        ' . $op3 . '
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" disabled type="radio" ' . (($mark == "D") ? "checked='checked'" : "") . ' value="D#' . $id . '" name="' . $id . '#Input" >
                                    <label class="form-check-label">
                                        ' . $op4 . '
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ';
    }
}
