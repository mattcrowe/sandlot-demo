import BaseForm from 'js/helpers/form';
import BaseService from 'js/helpers/service';

class Form extends BaseForm {

    constructor(options = {}) {
        super(options);
        this.service = new BaseService({baseUrl: '/api/players/'});
        this.setData({
            id: '',
            name: '',
        })
    }

}

export default Form;