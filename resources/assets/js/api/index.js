import NProgress from 'nprogress'
const API_ROOT = 'http://localhost:3000/admin/api/';
// const API_ROOT = 'http://isign.dev/admin/api/';
const API_ME = API_ROOT + 'me';
const API_USERS = API_ROOT + 'users';

export default {
    API_ROOT: API_ROOT,
    API_ME: API_ME,
    API_USERS: API_USERS,
    NProgress: NProgress
}