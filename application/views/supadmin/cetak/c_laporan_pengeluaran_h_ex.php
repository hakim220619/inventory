<?php
$cab = $this->db->get_where('data_cabang', ['id' => $this->uri->segment(5)])->row_array();
?>
<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto my-5 border p-5">
            <div class="text-center">
                <h5 class="text-uppercase">Laporan Pengeluaran Perhari</h5>
                <h5 class="text-uppercase"><?= $cab['nama_cabang'] ?></h5>
                <p class="font-weight-bold"><?= $cab['alamat'] ?></p>
                <b>Dari tanggal <?= $this->uri->segment(3) ?> - <?= $this->uri->segment(4) ?></b>

            </div>
            <div class="mt-3 mb-3">

            </div>
            <table class="table table-bordered" id="table-1">
                <thead>
                    <tr>
                        <th width="30" class="text-center">
                            No
                        </th>
                        <th>Tanggal</th>
                        <th>Total Penjualan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    $cabang = $this->uri->segment(5);

                    $anjay = $this->db->query($dats)->result_array();
                    foreach ($anjay as $dp) :
                        $this->db->select_sum('total_pengeluaran');
                        $total_pengeluaran = $this->db->get_where('riwayat_pengeluaran', ['tanggal_ind' => $dp['tanggal_ind'], 'id_cabang' => $cabang, 'status_bukti !=' => 0])->row_array();

                    ?>

                        <tr>
                            <td class="text-center">
                                <?= $no ?>
                            </td>

                            <td>
                                <?= $dp['tanggal_ind'] ?>
                            </td>
                            <td>
                                Rp. <?= rupiah($total_pengeluaran['total_pengeluaran']) ?>
                            </td>



                        </tr>
                    <?php $no++;
                    endforeach; ?>
                </tbody>
            </table>
            <div class="float-right text-center mt-5">
                <span class="pr-5">(</span>....<span class="pl-5">)</span>
            </div>
        </div>
    </div>
</div>