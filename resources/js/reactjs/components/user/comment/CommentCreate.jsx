import React, {Component} from "react";

class CommentCreate extends Component {
    constructor(props) {
        super(props);
        this.state = {
            message: '',
            errors: [],
        };
    }

    render() {
        return (
            <div className="media-body">
                <form>
                  <textarea className="form-control"
                        placeholder="laissez un commentaire à cette annonce..." rows="2"/>

                    <div className="text-right ml-auto">
                        <button className="btn btn-sm btn-success btn-icon" type="submit">
                            <span className="btn-inner--text">Poster</span>
                        </button>
                    </div>
                </form>
            </div>
        )
    }
}

export default CommentCreate;
