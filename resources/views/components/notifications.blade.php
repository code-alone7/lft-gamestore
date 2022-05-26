<div id="notifications" class="notifications" x-data="notifications">
  <ul class="notifications__list">
    <template x-for="notice of notifications" :key="notice.id">
      <li class="notifications__item">
        <div class="notification"
          :class="{
            'notification--green': notice.type === 'success',
            'notification--gray': notice.type === 'info',
            'notification--yellow': notice.type === 'warning',
            'notification--red': notice.type === 'error',
          }"
        >
          <div class="notification__content" x-text="notice.msg"></div>
          <button class="notification__btn js-notification-btn" @click="remove(notice.id)">
            <i class="fa-solid fa-xmark"></i>
          </button>
        </div>
      </li>
    </template>
  </ul>
</div>