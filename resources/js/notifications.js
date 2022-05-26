const NOTICE_TIMEOUT = 5000;
const NOTICE_TYPES = ['success', 'warning', 'error'];

export default () => ({
  notifications: [],
  nCounter: 0,

  add(type, msg) {
    if (!NOTICE_TYPES.includes(type)) throw new Error('no such notification type');

    let newNotice = { id: ++this.nCounter, type, msg }
    this.notifications.push(newNotice);
    setTimeout(() => this.remove(newNotice.id), NOTICE_TIMEOUT * this.notifications.length);
  },

  remove(id) {
    let index = this.notifications.findIndex(el => el.id == id);
    this.notifications.splice(index, 1);
  }
})