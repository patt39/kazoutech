import React from "react";
import Skeleton from "react-loading-skeleton";

function NavoccupationSkeleton() {
    return(
        <li className="mb-2">
            <Skeleton width={150} count={5}/>
        </li>
    )
}
export default NavoccupationSkeleton;
