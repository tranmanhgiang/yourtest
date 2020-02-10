<!-- success -->
<?php if(isset($_SESSION['success'])): ?>
<div class="alert alert-success" role="alert">
    <?php  echo $_SESSION['success']; unset($_SESSION['success']); ?>
</div>
<?php endif; ?>

<!-- error -->
<?php if(isset($_SESSION['error'])): ?>
<div class="alert alert-danger" role="alert">
    <?php  echo $_SESSION['error']; unset($_SESSION['error']); ?>
</div>
<?php endif; ?>



<!-- error_answers -->
<?php if(isset($_SESSION['answers'])): ?>
<div class="alert alert-danger" role="alert">
    <?php  echo $_SESSION['answers']; unset($_SESSION['answers']); ?>
</div>
<?php endif; ?>

<!-- error_true_answere -->
<?php if(isset($_SESSION['true_answers'])): ?>
<div class="alert alert-danger" role="alert">
    <?php  echo $_SESSION['true_answers']; unset($_SESSION['true_answers']); ?>
</div>
<?php endif; ?>