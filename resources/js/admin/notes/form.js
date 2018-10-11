import BaseForm from 'js/helpers/form';
import BaseService from 'js/helpers/service';

class Form extends BaseForm {

    constructor(options = {}) {
        super(options);
        this.service = new BaseService({baseUrl: '/api/notes/'});
        this.setData({
            id: '',
            color: '',
            title: '',
            body: '',
        });
    }

}

export default Form;