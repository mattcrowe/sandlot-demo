import BaseTable from 'js/helpers/table';
import BaseService from 'js/helpers/service';

class Table extends BaseTable {

    constructor(options = {}) {
        super(options);
        this.service = new BaseService({baseUrl: '/api/teams/'});
    }

}

export default Table;