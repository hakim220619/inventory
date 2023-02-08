<?php
?>
<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto my-5 border p-5">
            <div class="text-center">
                <h5 class="text-uppercase">Laporan Pengeluaran</h5>
                    <h5 class="text-uppercase"><?= $header ?></h5>
    
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
                        <th>Kode Pesanan</th>
                        <th>Tanggal</th>
                        <th>Cabang</th>
                        <th>Total Pengeluaran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                   
                    foreach ($pengeluaran as $dp) :
                        $cab = $this->db->get_where('data_cabang', ['id' => $dp['id_cabang']])->row_array();

                    ?>

                        <tr>
                            <td class="text-center">
                                <?= $no ?>
                            </td>

                            <td>
                                <?= $dp['kode_pesanan'] ?>
                            </td>
                            <td>
                                <?= $dp['tanggal_ind'] ?>
                            </td>
                            <td>
                                <?= $cab['nama_cabang'] ?>
                            </td>

                            <td>
                                Rp. <?= rupiah($dp['total_pengeluaran']) ?>
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