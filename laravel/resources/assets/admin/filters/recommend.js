export default (value) => {
    if (! value) {
        return '';
    } else {
        let status = ['不推荐', '推荐'];
        return status[value];
    }
};
