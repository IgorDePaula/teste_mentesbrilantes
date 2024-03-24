class OvenDoor {
    #glass = null


    constructor(glass) {
        this.#glass = glass
    }

    getGlass() {
        return this.#glass
    }
}

export default OvenDoor;
