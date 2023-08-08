import React from "react"
import styles from "./Bottom.module.scss"

export const Bottom = () => {
    return(
        <div className={styles.mobileBottom}>
            <ul className={styles.mobileList}>
                <li><a href="#"><img src="/home-page.svg" width={50} height={50} alt="" /></a></li>
                <li>0</li>
                <li>0</li>
                <li>0</li>
            </ul>
        </div>
    )
} 