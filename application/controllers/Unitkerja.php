<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unitkerja extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("user_login")) {
            redirect('Auth');
        }
    }

    public function index()
    {
        cekPergroup();
        $data['user'] = $this->General->fetch_records("tbl_user", ['id_sgroup' => 7, 'is_active' => 1]);
        $this->header('List Unit Kerja');
        $this->load->view('Unitkerja/list_unitkerja', $data);
        $this->footer();
    }

    public function listUnitkerja()
    {
        $list = $this->Serverside->_serverSide(
            'tbl_unit_kerja',
            ['no', 'kode_uker', 'nama_uker', 'ket_uker', 'is_active'],
            ['kode_uker', 'nama_uker', 'ket_uker'],
            ['id_uker' => 'desc'],
            null,
            'data'
        );
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $results) {
            $buttonDisable = $results->is_active == 1 ? '' : 'disabled';
            $buttonWarna = $results->is_active == 1 ? 'danger' : 'success';

            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $results->kode_uker;
            $row[] = $results->nama_uker;
            $row[] = $results->ket_uker;
            $row[] = statusActiveNonactive($results->is_active);
            $row[] = "<button type='button' class='btn btn-warning' $buttonDisable onclick='VUnitkerja($results->id_uker)'>
                        <i class='fa fa-pencil-square-o'></i>
                    </button>
                    <button type='button' class='btn btn-$buttonWarna' onclick='activeUnitkerja($results->id_uker)'>
                        <i class='fa fa-power-off' aria-hidden='true'></i>
                    </button>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('tbl_unit_kerja'),
            "recordsFiltered" => $this->Serverside->_serverSide('tbl_unit_kerja'),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function formUnitkerja()
    {
        if (input('id_uker')) {
            $this->_editUnitkerja();
        } else {
            $this->_saveUnitkerja();
        }
    }

    private function _saveUnitkerja()
    {
        $data = array(
            'kode_uker' => input('kode'),
            'nama_uker' => input('nama'),
            'ket_uker' => input('ket'),
            'is_active' => 1,
            'uker_created_by' => $this->session->userdata('user_login')['username']
        );

        $response = $this->General->insertRecord('tbl_unit_kerja', $data);

        if ($response) {
            LogActivity($this->db->last_query());
            $pesan = array(
                'pesan' => 'Data berhasil di simpan!',
                'tipe' => 'success'
            );

            echo json_encode($pesan);
        } else {
            $pesan = array(
                'pesan' => 'Data gagal di simpan!',
                'tipe' => 'error'
            );

            echo json_encode($pesan);
        }
    }

    public function viewUnitkerja($id_uker)
    {
        $data = $this->General->fetch_records('tbl_unit_kerja', ['id_uker' => $id_uker]);
        echo json_encode($data);
    }

    private function _editUnitkerja()
    {
        $data = array(
            'kode_uker' => input('kode'),
            'nama_uker' => input('nama'),
            'ket_uker' => input('ket'),
            'uker_updated_date' => date('Y-m-d H:i:s'),
            'uker_updated_by' => $this->session->userdata('user_login')['username']
        );

        $response = $this->General->update_record($data, ['id_uker' => input('id_uker')], 'tbl_unit_kerja');

        if ($response) {
            LogActivity($this->db->last_query());
            $pesan = array(
                'pesan' => 'Data berhasil di edit!',
                'tipe' => 'success'
            );

            echo json_encode($pesan);
        } else {
            $pesan = array(
                'pesan' => 'Data gagal di edit!',
                'tipe' => 'error'
            );

            echo json_encode($pesan);
        }
    }

    public function activeUnitkerja()
    {
        $data = $this->General->fetch_records('tbl_unit_kerja', ['id_uker' => input('id_uker')]);
        if ($data[0]->is_active == 1) {
            $this->General->update_record(['is_active' => 0], ['id_uker' => input('id_uker')], 'tbl_unit_kerja');
            $message = "Data berhasil di non aktifkan!";
        } else {
            $this->General->update_record(['is_active' => 1], ['id_uker' => input('id_uker')], 'tbl_unit_kerja');
            $message = "Data berhasil di aktifkan!";
        }
        LogActivity($this->db->last_query());

        echo json_encode($message);
    }
}
