<?= $this->extend('layout/main') ?>
<?= $this->extend('layout/menu') ?>
<?= $this->section('isi') ?>



<div class="container">
<div class="col-sm-12">
<div class="card m-b-60">
<div class="card-body">
<p class="card-text">

<h3>Data Dokter</h3>
    
<button type="button" class="btn btn-sm btn-primary" data-target="#addModal" data-toggle="modal"> Tambah </button>
   <table class="table table-sm table-striped" id="datadokter">
   <thead>
   <tr>
    <th>No </th>
    <th>Id Dokter </th>
    <th>Nama Dokter </th>
    <th>No Hp </th>
    <th>Action </th>
    </tr>
    </thead>
<tbody>
<?php $no=0; foreach($dokter as $row) : $no++ ?>
<tr>
<td> <?= $no ?> </td>
<td> <?= $row['id_dokter']; ?> </td>
<td> <?= $row['nama_dokter']; ?> </td>
<td> <?= $row['nohp_dokter']; ?> </td>
<td> 
    <button type="button" class="btn btn-info btn-sm btn-edit"
      data-id="<?=$row['id_dokter']; ?>"
      data-nama="<?=$row['nama_dokter']; ?>"
      data-nohp="<?=$row['nohp_dokter']; ?>">

    <i class="fa fa-tags"></i>
    </button>

    <button type="button" class="btn btn-danger btn-sm btn-delete"  data-id="<?=$row['id_dokter']; ?>">
    <i class="fa fa-trash"></i>
    </button>

    <!-- Form Edit -->
<form action="/dokter/edit" method="post">
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="col-md-6">
        <label>Id Dokter</label>
        <input type="text" class="form-control" name="iddokter">
      </div>
      <div class="col-md-6">
        <label>Nama Dokter</label>
        <input type="text" class="form-control" name="namadokter" placeholder="nama dokter">
      </div>
      <div class="col-md-6">
        <label>Nohp Dokter</label>
        <input type="text" class="form-control" name="nohpdokter">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>
<!-- Akhir Form Edit -->


<form action="/dokter/delete" method="post">
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h3>Apa Anda Yakin Akan Menghapus Data Ini?</h3>
      <div class="modal-footer">
        <input type="hidden" name="iddokter" class="iddokter">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Iya</button>
      </div>
    </div>
  </div>
</div>
</form>
    </td>



</tr>
<?php endforeach ;?>
</tbody>
</p>
</table>
</div>
</div>
</div>
</div>

<!-- Modal Tambah -->
<form action="/dokter/save" method="post">
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="col-md-6">
        <label>Id Dokter</label>
        <input type="text" class="form-control" name="iddokter">
      </div>
      <div class="col-md-6">
        <label>Nama Dokter</label>
        <input type="text" class="form-control" name="namadokter" placeholder="nama dokter">
      </div>
      <div class="col-md-6">
        <label>Nohp Dokter</label>
        <input type="text" class="form-control" name="nohpdokter">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>
<!-- Akhir Form Tambah -->



<!-- Form Delete -->




<script>
$(document).ready(function(){
$('#datadokter').DataTable();
});

$('.btn-delete').on('click', function() {
        const id = $(this).data('id');
        $('.iddokter').val(id);
        $('#deleteModal').modal('show');
    });

    $('.btn-edit').on('click', function() {
        const id = $(this).data('id');
        const nama = $(this).data('nama');
        const nohp = $(this).data('nohp');

        $('.iddokter').val(id);
        $('.namadokter').val(nama);
        $('.nohpdokter').val(nohp).trigger('change');

        $('#editModal').modal('show');
    });
</script>



<?= $this->endSection('') ?>
