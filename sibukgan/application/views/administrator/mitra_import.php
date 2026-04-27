<h4>Import Data Mitra (Excel)</h4>

<form action="<?= base_url('administrator/mitra/import_excel') ?>"
      method="post" enctype="multipart/form-data">

    <input type="file" name="file_excel" accept=".xls,.xlsx" required>
    <br><br>

    <button type="submit" class="btn btn-success">
        Import Excel
    </button>
</form>
