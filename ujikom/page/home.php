<!-- <div class="container my-4 p-5 bg-hero rounded">
    <div class="py-5 text-white">
        <p class="display-5 fw-bold">Galeri Foto</p>
    </div>
</div> -->
<div class="container my-4 p-2">
    <div class="row">
        <?php 
            $tampil=mysqli_query($conn, "SELECT * FROM foto INNER JOIN user ON foto.user_id=user.user_id");
            foreach($tampil as $tampils):
        ?>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100">
                <img src="uploads/<?= $tampils['lokasi_file'] ?>" class="object-fit-cover" style="aspect-ratio: 16/9;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title mb-0"><?= $tampils['judul_foto'] ?></h5>
                    <p class="card-text text-muted mb-0">by: <?= $tampils['username'] ?></p>
                    <div class="mt-auto">
                        <a href="?url=detail&&id=<?= $tampils['foto_id'] ?>" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>