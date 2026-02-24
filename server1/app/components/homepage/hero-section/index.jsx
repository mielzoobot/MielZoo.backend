// @flow strict

import { personalData } from "@/utils/data/personal-data";
import Image from "next/image";
import Video from "next/image"; 
import Link from "next/link";
import { BsGithub, BsLinkedin } from "react-icons/bs";
import { FaFacebook, FaTwitterSquare } from "react-icons/fa";
import { MdDownload } from "react-icons/md";
import { RiContactsFill } from "react-icons/ri";
import { SiLeetcode } from "react-icons/si";
import { FaInstagram } from "react-icons/fa";
import { MdOutlineRocketLaunch } from "react-icons/md";
import { RiQuestionAnswerLine } from "react-icons/ri";
import {isMobile} from 'react-device-detect';



function HeroSection() {
  return (
    <section className="relative flex flex-col items-center justify-between py-4 lg:py-12">
      <Image
        src="/hero.svg"
        alt="Hero"
        width={1572}
        height={795}
        className="absolute -top-[98px] -z-10"
     
      />
      
      <div className="grid grid-cols-1 items-start lg:grid-cols-2 lg:gap-12 gap-y-8">
        <div className="order-2 lg:order-1 flex flex-col items-start justify-center p-2 pb-20 md:pb-10 lg:pt-10">
          <h1 className="text-3xl font-bold leading-10 text-white md:font-extrabold lg:text-[2.6rem] lg:leading-[3.5rem]">
            MielZoo <br />
            La plate-forme  {' '}
            <span className=" text-pink-500">Caribéenne</span>
            {` dédie à l'administratif, `}
            <span className=" text-[#16f2b3]">OpenSource et Collaborative</span>
            .
          </h1>

          <div className="my-12 flex items-center gap-5">
             <Link
              href='#'
              target='_blank'
              className="transition-all text-pink-500 hover:scale-125 duration-300"
            >
              <BsLinkedin size={30} />
            </Link>
             <Link
              href='#'
              target='_blank'
              className="transition-all text-pink-500 hover:scale-125 duration-300"
            >
              <FaInstagram size={30} />
            </Link>         
            <Link
              href='#'
              target='_blank'
              className="transition-all text-pink-500 hover:scale-125 duration-300"
            >
              <FaFacebook size={30} />
            </Link>
              <Link
              href='#'
              target='_blank'
              className="transition-all text-pink-500 hover:scale-125 duration-300"
            >
              <BsGithub size={30} />
            </Link>
            
          </div>

          <div className="flex items-center gap-3">
            <Link href="#contact" className="bg-gradient-to-r to-pink-500 from-violet-600 p-[1px] rounded-full transition-all duration-300 hover:from-pink-500 hover:to-violet-600">
              <button className="px-3 text-xs md:px-8 py-3 md:py-4 bg-[#0d1224] rounded-full border-none text-center md:text-sm font-medium uppercase tracking-wider text-[#ffff] no-underline transition-all duration-200 ease-out  md:font-semibold flex items-center gap-1 hover:gap-3">
                <span>En savoir + </span>
                <RiQuestionAnswerLine size={26} /> 
              </button>
            </Link>

            <Link className="flex items-center gap-1 hover:gap-3 rounded-full bg-gradient-to-r from-pink-500 to-violet-600 px-3 md:px-8 py-3 md:py-4 text-center text-xs md:text-sm font-medium uppercase tracking-wider text-white no-underline transition-all duration-200 ease-out hover:text-white hover:no-underline md:font-semibold" role="button" target="_self" href="http://login.mielzoo.cloud"
            >
              <span>An nou ay</span>
              <MdOutlineRocketLaunch size={26} />
            </Link>
          </div>

        </div>
        <div className="order-1 lg:order-2 from-[#0d1224] border-[#1b2c68a0] relative rounded-lg border bg-gradient-to-r to-[#]">
          <div className="flex flex-row">
            <div className="h-[1px] w-full bg-gradient-to-r from-transparent via-pink-500 to-violet-600"></div>
            <div className="h-[1px] w-full bg-gradient-to-r from-violet-600 to-transparent"></div>
          </div>

          <div className="px-4 lg:px-8 py-5">
        
            <div className="flex flex-row space-x-2">
              Mielzoo.cloud 
                      
            </div>
          </div>
          <div className="overflow-hidden border-t-[2px] border-indigo-900 px-4 lg:px-8 py-4 lg:py-8">
            <code className="font-mono text-xs md:text-sm lg:text-base">

              <div className="blink" >
              
              </div>
             
              
              
              <div className="">
                 <span className=" text-pink-500 text-3xl font-bold leading-10 md:font-extrabold lg:text-[1.6rem] lg:leading-[2.5rem]">MielZoo.cloud</span>
            <span className=" text-white text-3xl font-bold leading-10 text-white md:font-extrabold lg:text-[1.6rem] lg:leading-[2.5rem]">
            {` joue le rôle d'une équipe transverse virtuelle au service des `}
</span>
            <span className=" text-[#16f2b3] text-3xl font-bold leading-10 text-white md:font-extrabold lg:text-[1.6rem] lg:leading-[2.5rem]">PME, PMI et TPE. Pour vous laisser vous concentrer sur l'essentiel.</span>



              </div>
          
              <div>
       <span className=" text-[#16f2b3] text-3xl font-bold leading-10 text-white md:font-extrabold lg:text-[1.6rem] lg:leading-[2.5rem]">                

</span>

              </div>
              <div>
           <span className=" text-[#16f2b3] text-3xl font-bold leading-10 text-white md:font-extrabold lg:text-[1.6rem] lg:leading-[2.5rem]">                
Construisez le Quotidien professionnel qui vous correspond!
</span>
              </div>
              <div>
              
              </div>
              <div>
            
              
         
              </div>
             
            </code>

          </div>
                <Image
        src="/Ap2.png"
        alt="Hero"
        width={640}
        height={640}
        className="absolute -top-[-50px] -z-10  "
      />
        </div>
      
      </div>

    </section>
   
  );
};

export default HeroSection;
