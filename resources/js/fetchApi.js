import _extend from 'lodash/extend';

export default function fetchApi(path, options = {}) {
    let opt = _extend({
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        },
        method: 'GET'
    }, options);

    return fetch(path, opt);
}
