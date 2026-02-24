import adobeXd from '../app/assets/svg/skills/adobe-xd.svg';
import adobeaudition from '../app/assets/svg/skills/adobeaudition.svg';
import afterEffects from '../app/assets/svg/skills/after-effects.svg';
import slack from '../app/assets/svg/skills/slack.svg';
import android from '../app/assets/svg/skills/android.svg';
import trello from '../app/assets/svg/skills/trello.svg';
import blender from '../app/assets/svg/skills/blender.svg';
import apple from '../app/assets/svg/skills/apple.svg';
import word from '../app/assets/svg/skills/word.svg';
import c from '../app/assets/svg/skills/c.svg';
import canva from '../app/assets/svg/skills/canva.svg';
import capacitorjs from '../app/assets/svg/skills/capacitorjs.svg';
import coffeescript from '../app/assets/svg/skills/coffeescript.svg';
import cplusplus from '../app/assets/svg/skills/cplusplus.svg';
import csharp from '../app/assets/svg/skills/csharp.svg';
import salesforce from '../app/assets/svg/skills/salesforce.svg';
import dart from '../app/assets/svg/skills/dart.svg';
import deno from '../app/assets/svg/skills/deno.svg';
import googledrive from '../app/assets/svg/skills/googledrive.svg';
import chrome from '../app/assets/svg/skills/chrome.svg';
import fastify from '../app/assets/svg/skills/fastify.svg';
import edge from '../app/assets/svg/skills/edge.svg';
import gmail from '../app/assets/svg/skills/gmail.svg';
import flutter from '../app/assets/svg/skills/flutter.svg';
import todoist from '../app/assets/svg/skills/todoist.svg';
import gimp from '../app/assets/svg/skills/gimp.svg';
import access from '../app/assets/svg/skills/access.svg';
import dropbox from '../app/assets/svg/skills/dropbox.svg';
import graphql from '../app/assets/svg/skills/graphql.svg';
import haxe from '../app/assets/svg/skills/haxe.svg';
import sage from '../app/assets/svg/skills/sage.svg';
import illustrator from '../app/assets/svg/skills/illustrator.svg';
import macos from '../app/assets/svg/skills/macos.svg';
import zoom from '../app/assets/svg/skills/zoom.svg';
import javascript from '../app/assets/svg/skills/javascript.svg';
import julia from '../app/assets/svg/skills/julia.svg';
import kotlin from '../app/assets/svg/skills/kotlin.svg';
import lightroom from '../app/assets/svg/skills/lightroom.svg';
import whatsapp from '../app/assets/svg/skills/whatsapp.svg';
import outlook from '../app/assets/svg/skills/outlook.svg';
import matlab from '../app/assets/svg/skills/matlab.svg';
import memsql from '../app/assets/svg/skills/memsql.svg';
import notion from '../app/assets/svg/skills/notion.svg';
import linkedin from '../app/assets/svg/skills/linkedin.svg';
import firefox from '../app/assets/svg/skills/firefox.svg';
import nextJS from '../app/assets/svg/skills/nextJS.svg';
import pdf from '../app/assets/svg/skills/pdf.svg';
import numpy from '../app/assets/svg/skills/numpy.svg';
import nuxtJS from '../app/assets/svg/skills/nuxtJS.svg';
import opencv from '../app/assets/svg/skills/opencv.svg';
import telegram from '../app/assets/svg/skills/telegram.svg';
import php from '../app/assets/svg/skills/php.svg';
import picsart from '../app/assets/svg/skills/picsart.svg';
import excel from '../app/assets/svg/skills/excel.svg';
import premierepro from '../app/assets/svg/skills/premierepro.svg';
import prisma from '../app/assets/svg/skills/prisma.svg';
import workday from '../app/assets/svg/skills/workday.svg';
import pytorch from '../app/assets/svg/skills/pytorch.svg';
import sap from '../app/assets/svg/skills/sap.svg';
import ruby from '../app/assets/svg/skills/ruby.svg';
import selenium from '../app/assets/svg/skills/selenium.svg';
import sketch from '../app/assets/svg/skills/sketch.svg';
import powerbi from '../app/assets/svg/skills/powerbi.svg';
import svelte from '../app/assets/svg/skills/svelte.svg';
import swift from '../app/assets/svg/skills/swift.svg';
import tailwind from '../app/assets/svg/skills/tailwind.svg';
import tensorflow from '../app/assets/svg/skills/tensorflow.svg';
import typescript from '../app/assets/svg/skills/typescript.svg';
import microsoftwindows from '../app/assets/svg/skills/microsoftwindows.svg';
import vitejs from '../app/assets/svg/skills/vitejs.svg';
import vue from '../app/assets/svg/skills/vue.svg';
import vuetifyjs from '../app/assets/svg/skills/vuetifyjs.svg';
import webix from '../app/assets/svg/skills/webix.svg';
import wolframalpha from '../app/assets/svg/skills/wolframalpha.svg';
import wordpress from '../app/assets/svg/skills/wordpress.svg';

import pandas from '../app/assets/svg/skills/pandas.svg';
import scikitlearn from '../app/assets/svg/skills/scikit-learn.svg';
import dotnet from '../app/assets/svg/skills/dotnet.svg';
import dotnetcore from '../app/assets/svg/skills/dotnetcore.svg'
import kubernetes from '../app/assets/svg/skills/kubernetes.svg'
import linux from '../app/assets/svg/skills/linux.svg'
import sqlalchemy from '../app/assets/svg/skills/sqlalchemy.svg'
import fastapi from '../app/assets/svg/skills/fastapi.svg'



export const skillsImage = (skill) => {
  const skillID = skill.toLowerCase();
  switch (skillID) {
    case 'todoist':
      return todoist;
    case 'sage':
      return sage;
    case 'telegram':
      return telegram;
    case 'chrome':
      return chrome;
    case 'illustrator':
      return illustrator;
    case 'adobe xd':
      return adobeXd;
    case 'after effects':
      return afterEffects;
    case 'salesforce':
      return salesforce;
    case 'slack':
      return slack;
    case 'javascript':
      return javascript;
    case 'next js':
      return nextJS;
    case 'nuxt js':
      return nuxtJS;
    case 'sap':
      return sap;
    case 'svelte':
      return svelte;
    case 'typescript':
      return typescript;
    case 'vue':
      return vue;
    case 'apple':
      return apple;
    case 'word':
      return word;
    case 'capacitorjs':
      return capacitorjs;
    case 'coffeescript':
      return coffeescript;
    case 'memsql':
      return memsql;
    case 'linkedin':
      return linkedin;
    case 'firefox':
      return firefox;
    case 'excel':
      return excel;
    case 'tailwind':
      return tailwind;
    case 'vitejs':
      return vitejs;
    case 'vuetifyjs':
      return vuetifyjs;
    case 'c':
      return c;
    case 'c++':
      return cplusplus;
    case 'c#':
      return csharp;
    case 'dart':
      return dart;
    case 'dropbox':
      return dropbox;
    case 'zoom':
      return zoom;
    case 'kotlin':
      return kotlin;
    case 'julia':
      return julia;
    case 'matlab':
      return matlab;
    case 'php':
      return php;
    case 'prisma':
      return prisma;
    case 'workday':
      return workday;
    case 'ruby':
      return ruby;
    case 'swift':
      return swift;
    case 'adobe audition':
      return adobeaudition;
    case 'android':
      return android;
    case 'deno':
      return deno;
    case 'google drive':
      return googledrive;
    case 'gmail':
      return gmail;
    case 'gimp':
      return gimp;
    case 'access':
      return access;
    case 'graphql':
      return graphql;
    case 'lightroom':
      return lightroom;
    case 'outlook':
      return outlook;
    case 'pdf':
      return pdf;
    case 'numpy':
      return numpy;
    case 'opencv':
      return opencv;
    case 'premiere pro':
      return premierepro;
    case 'pytorch':
      return pytorch;
    case 'selenium':
      return selenium;
    case 'power bi':
      return powerbi;
    case 'tensorflow':
      return tensorflow;
    case 'webix':
      return webix;
    case 'wordpress':
      return wordpress;
    case 'trello':
      return trello;
    case 'blender':
      return blender;
    case 'fastify':
      return fastify;
    case 'edge':
      return edge;
    case 'flutter':
      return flutter;
    case 'haxe':
      return haxe;
    case 'macos':
      return macos;
    case 'whatsapp':
      return whatsapp;
    case 'notion':
      return notion;
    case 'picsart':
      return picsart;
    case 'sketch':
      return sketch;
    case 'microsoft windows':
      return microsoftwindows;
    case 'wolframalpha':
      return wolframalpha;
    case 'canva':
      return canva;
    case 'pandas':
      return pandas;
    case 'sklearn':
      return scikitlearn;
    case '.net':
      return dotnet;
    case '.net core':
      return dotnetcore
    case 'kubernetes':
      return kubernetes;
    case 'linux':
      return linux;
    case 'sqlalchemy':
      return sqlalchemy;
    case 'fastapi':
      return fastapi;
    default:
      break;
  }
}
