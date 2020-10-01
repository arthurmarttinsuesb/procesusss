<ul class="todo-list" data-widget="todo-list">
    <li>
        @foreach($log as $logs)
            <span class="handle">
                <i class="fas fa-arrow-right"></i>
            </span><?php echo $logs->status ?>
            <small class="badge badge-success"><i class="far fa-calendar-alt"></i> {{date('d/m/Y - H:s', strtotime($logs->created_at))}}</small><hr>
        @endforeach
    </li>
</ul>
  



