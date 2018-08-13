
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import ChecksPrivileges from './services/ChecksPrivileges'
Vue.use(ChecksPrivileges);

Vue.component('user-list', require('./components/UsersListComponent.vue'));
Vue.component('user-list-view', require('./components/UserListViewComponent'));
Vue.component('profile-view', require('./components/ProfileView'));
Vue.component('profile-avatar', require('./components/ProfileAvatarComponent'));
Vue.component('file-upload',require('./components/FileUpload.vue'));
Vue.component('department-list',require('./components/DepartmentListComponent.vue'));
Vue.component('department-list-view',require('./components/DepartmentListView.vue'));
Vue.component('team-list',require('./components/TeamListComponent.vue'));
Vue.component('team-list-view',require('./components/TeamListView.vue'));
Vue.component('user-development',require('./components/UserDevelopmentComponent.vue'));
Vue.component('user-hobbies',require('./components/UserHobby'));
Vue.component('user-children',require('./components/UserChild'));
Vue.component('hobby-add',require('./components/HobbyAdd'));
Vue.component('hobby-add-new',require('./components/HobbyAddNew'));
Vue.component('select2',require('./components/Select2Component'));
Vue.component('department-user-list-draggable', require('./components/DepartmentUserListDraggable'));
Vue.component('department-user-list', require('./components/DepartmentUserList'));
Vue.component('department-user-list-view', require('./components/DepartmentUserListView'));
Vue.component('user-role', require('./components/UserRole'));

const app = new Vue({
    el: '#app'
});
