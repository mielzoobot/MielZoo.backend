import {BasePage} from './Base.js?v=2';
import {DeleteAccountPopUp} from '../parts/popup/DeleteAccountPopUp.js?v=2';

export class SettingsPage extends BasePage {
    constructor() {
        super('settings');

        this.initUi();
    }

    initUi() {
        new DeleteAccountPopUp();
    }
}
