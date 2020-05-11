import React  from "react";
import Skeleton from 'react-loading-skeleton';
import {Link} from "react-router-dom";

function OccupationListSkeleton(props) {

    return(
        <>
            <div className="col-lg-4 mx-auto">
                <Skeleton height={317} width={320} />
            </div>

            <div className="col-lg-4 mx-auto">
                <Skeleton height={317} width={320} />
            </div>

            <div className="col-lg-4 mx-auto">
                <Skeleton height={317} width={320} />
            </div>
        </>
    )
}
export default OccupationListSkeleton;
