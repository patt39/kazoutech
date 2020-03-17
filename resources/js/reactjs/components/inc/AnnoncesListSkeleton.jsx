import React  from "react";
import Skeleton from 'react-loading-skeleton';
import {Link, NavLink} from "react-router-dom";
import moment from "moment";
import {Button} from "reactstrap";

function AnnoncesListSkeleton(props) {

    return(
        <>
            <div className="card card-blog card-plain blog-horizontal mb-5">
                <div className="row">
                    <div className="col-lg-12">
                        <h5 className="card-title">
                            <Skeleton width={200}/>
                        </h5>
                        <p className="card-description">
                            <Skeleton count={3}/>
                        </p>

                    </div>
                </div>
            </div>

            <div className="card card-blog card-plain blog-horizontal mb-5">
                <div className="row">
                    <div className="col-lg-12">
                        <h5 className="card-title">
                            <Skeleton width={200}/>
                        </h5>
                        <p className="card-description">
                            <Skeleton count={3}/>
                        </p>

                    </div>
                </div>
            </div>

            <div className="card card-blog card-plain blog-horizontal mb-5">
                <div className="row">
                    <div className="col-lg-12">
                        <h5 className="card-title">
                            <Skeleton width={200}/>
                        </h5>
                        <p className="card-description">
                            <Skeleton count={3}/>
                        </p>

                    </div>
                </div>
            </div>

        </>
    )
}
export default AnnoncesListSkeleton;
