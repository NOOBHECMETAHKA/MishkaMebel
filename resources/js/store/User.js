class User {
    constructor() {
        this.authenticated = false;
        this.userData = {
            uIDData: {},
            personalInformation: null,
            addresses: null
        };
    }

    reset() {
        this.authenticated = false;
        this.userData = {
            uIDData: {},
            personalInformation: null,
            addresses: null
        };
    }

    setAuthenticated(value) {
        this.authenticated = value;
    }

    setUserData(uIDData, personalInformation, addresses) {
        this.userData.uIDData = uIDData;
        this.userData.personalInformation = personalInformation;
        this.userData.addresses = addresses;
    }

    setUIDData(uIDData) {
        this.userData.uIDData = uIDData;
    }

    setPersonalInformation(personalInformation) {
        this.userData.personalInformation = personalInformation;
    }

    setAddresses(addresses) {
        this.userData.addresses = addresses;
    }

    getAuthenticated() {
        return this.authenticated;
    }

    getUserData() {
        return this.userData;
    }

    getUIDData() {
        return this.userData.uIDData;
    }

    getPersonalInformation() {
        return this.userData.personalInformation;
    }

    getAddresses() {
        return this.userData.addresses;
    }
}

export default User;
