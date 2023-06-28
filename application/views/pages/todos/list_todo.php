<div class="content-wrapper">

  <?php if (empty($todos)): ?>
    <p>Tidak ada tugas untuk proyek ini.</p>
  <?php else: ?>
    <ul>
      <?php foreach ($todos as $todo): ?>
        <li>
          <?php echo $todo->todo_name; ?>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
</div>